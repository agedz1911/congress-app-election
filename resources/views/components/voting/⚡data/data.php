<?php

use App\Models\Participant;
use App\Models\Voting;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component 
{
    use WithPagination;

    public $perPage = 5;
    public $query = '';
    public $selectedParticipantIds = [];
    public $selectAllCurrentPage = false;
    public $feedbackMessage = '';

    public function search()
    {
        $this->resetPage();
    }

    public function updatedSelectAllCurrentPage(bool $value): void
    {
        if ($value) {
            $this->selectedParticipantIds = $this->participants
                ->pluck('id')
                ->map(fn ($id) => (string) $id)
                ->values()
                ->all();

            return;
        }

        $this->selectedParticipantIds = [];
    }

    public function updatedSelectedParticipantIds(): void
    {
        $participantIdsOnPage = $this->participants
            ->pluck('id')
            ->map(fn ($id) => (string) $id)
            ->values()
            ->all();

        $this->selectAllCurrentPage = count($participantIdsOnPage) > 0
            && count(array_diff($participantIdsOnPage, $this->selectedParticipantIds)) === 0;
    }

    public function resetSelectedVotingStatus(): void
    {
        if (count($this->selectedParticipantIds) === 0) {
            $this->feedbackMessage = 'Pilih minimal 1 peserta terlebih dahulu.';
            return;
        }

        $votings = Voting::withTrashed()
            ->whereIn('participant_id', $this->selectedParticipantIds)
            ->get();

        $affectedRows = $votings->count();
        $votings->each->forceDelete();

        $this->feedbackMessage = $affectedRows > 0
            ? "Berhasil mereset status voting {$affectedRows} peserta terpilih."
            : 'Peserta terpilih belum memiliki data voting aktif.';

        $this->selectAllCurrentPage = false;
        $this->selectedParticipantIds = [];
        unset($this->participants);
    }

    public function resetAllVotingStatus(): void
    {
        $votings = Voting::withTrashed()->get();

        $affectedRows = $votings->count();
        $votings->each->forceDelete();

        $this->feedbackMessage = $affectedRows > 0
            ? "Berhasil mereset semua data voting ({$affectedRows} data)."
            : 'Tidak ada data voting aktif untuk direset.';

        $this->selectAllCurrentPage = false;
        $this->selectedParticipantIds = [];
        unset($this->participants);
    }

    #[Computed()]
    public function participants()
    {
        $participants = Participant::with(['voting']);
        if (strlen($this->query) >= 3) {
            $participants->where(function ($query) {
                $query->where('full_name', 'like', '%' . $this->query . '%')
                    ->orWhere('participant_number', 'like', '%' . $this->query . '%')
                    ->orWhere('institution', 'like', '%' . $this->query . '%');
            });
        }
        return $participants->paginate($this->perPage);
    }

};
