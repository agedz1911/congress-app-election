<?php

use App\Models\Candidate;
use App\Models\Participant;
use App\Models\Voting;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

new class extends Component
{
    public $candidates = [];
    public $step = 1;
    public $participantNumber = '';
    public $selectedParticipant = null;
    public $selectedCandidateId = null;

    public function mount()
    {
        $this->candidates = Candidate::orderBy('no_urut', 'asc')->get();
    }

    public function submitParticipant(): void
    {
        $this->validate([
            'participantNumber' => ['required', 'string', 'max:255'],
        ], [
            'participantNumber.required' => 'Participant number wajib diisi.',
        ]);

        $participant = Participant::query()
            ->where('participant_number', trim($this->participantNumber))
            ->first();

        if ($participant === null) {
            $this->addError('participantNumber', 'Participant number tidak ditemukan.');
            return;
        }

        if (Voting::where('participant_id', $participant->id)->exists()) {
            $this->addError('participantNumber', 'Peserta ini sudah melakukan voting.');
            return;
        }

        $this->resetValidation();
        $this->selectedParticipant = $participant;
        $this->selectedCandidateId = null;
        $this->step = 2;
    }

    public function selectCandidate(string $candidateId): void
    {
        if ($this->step !== 2) {
            return;
        }

        $this->selectedCandidateId = $candidateId;
    }

    public function resetSelection(): void
    {
        $this->selectedCandidateId = null;
    }

    public function resetToStart(): void
    {
        $this->step = 1;
        $this->participantNumber = '';
        $this->selectedParticipant = null;
        $this->selectedCandidateId = null;
        $this->resetValidation();
    }

    public function saveVoting(): void
    {
        if ($this->selectedParticipant === null) {
            $this->step = 1;
            $this->addError('participantNumber', 'Peserta belum dipilih.');
            return;
        }

        $this->validate([
            'selectedCandidateId' => ['required', 'exists:candidates,id'],
        ], [
            'selectedCandidateId.required' => 'Silakan pilih kandidat terlebih dahulu.',
        ]);

        $participantId = data_get($this->selectedParticipant, 'id');

        if ($participantId === null) {
            $this->step = 1;
            $this->addError('participantNumber', 'Data peserta tidak valid. Silakan scan ulang.');
            return;
        }

        try {
            DB::transaction(function () use ($participantId): void {
                Participant::whereKey($participantId)->lockForUpdate()->first();

                if (Voting::where('participant_id', $participantId)->lockForUpdate()->exists()) {
                    throw new \RuntimeException('ALREADY_VOTED');
                }

                Voting::create([
                    'voting_number' => $this->generateVotingNumber(),
                    'participant_id' => $participantId,
                    'candidate_id' => $this->selectedCandidateId,
                    'voting_time' => now(),
                ]);
            });
        } catch (\RuntimeException $exception) {
            if ($exception->getMessage() === 'ALREADY_VOTED') {
                $this->resetToStart();
                $this->addError('participantNumber', 'Peserta ini sudah melakukan voting.');
                return;
            }

            throw $exception;
        } catch (QueryException $exception) {
            $this->resetToStart();
            $this->addError('participantNumber', 'Voting gagal diproses karena data sudah tersimpan sebelumnya.');
            return;
        }

        $this->step = 3;
    }

    protected function generateVotingNumber(): string
    {
        do {
            $number = 'V-' . str_pad((string) random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Voting::where('voting_number', $number)->exists());

        return $number;
    }
};
