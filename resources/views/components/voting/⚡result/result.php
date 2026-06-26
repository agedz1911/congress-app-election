<?php

use App\Models\Candidate;
use App\Models\Participant;
use App\Models\Voting;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed()]
    public function totalParticipants(): int
    {
        return Participant::count();
    }

    #[Computed()]
    public function totalVotes(): int
    {
        return Voting::count();
    }

    #[Computed()]
    public function notVotedYet(): int
    {
        return max($this->totalParticipants - $this->totalVotes, 0);
    }

    #[Computed()]
    public function participationRate(): float
    {
        if ($this->totalParticipants === 0) {
            return 0;
        }

        return round(($this->totalVotes / $this->totalParticipants) * 100, 2);
    }

    #[Computed()]
    public function candidateResults(): array
    {
        $palette = [
            [
                'background' => '#f43f5e',
                'card' => 'border-rose-100 bg-rose-50/10 hover:bg-rose-50/20',
                'badge' => 'bg-rose-500 text-white',
                'text' => 'text-rose-600',
                'bar' => 'bg-rose-500',
            ],
            [
                'background' => '#10b981',
                'card' => 'border-emerald-100 bg-emerald-50/10 hover:bg-emerald-50/20',
                'badge' => 'bg-emerald-500 text-white',
                'text' => 'text-emerald-600',
                'bar' => 'bg-emerald-500',
            ],
            [
                'background' => '#3b82f6',
                'card' => 'border-blue-100 bg-blue-50/10 hover:bg-blue-50/20',
                'badge' => 'bg-blue-500 text-white',
                'text' => 'text-blue-600',
                'bar' => 'bg-blue-500',
            ],
            [
                'background' => '#f59e0b',
                'card' => 'border-amber-100 bg-amber-50/10 hover:bg-amber-50/20',
                'badge' => 'bg-amber-500 text-white',
                'text' => 'text-amber-600',
                'bar' => 'bg-amber-500',
            ],
        ];

        return Candidate::query()
            ->withCount('votings')
            ->orderBy('no_urut')
            ->get()
            ->values()
            ->map(function (Candidate $candidate, int $index) use ($palette): array {
                $theme = $palette[$index % count($palette)];
                $votes = (int) $candidate->votings_count;
                $percentage = $this->totalVotes > 0
                    ? round(($votes / $this->totalVotes) * 100, 2)
                    : 0;

                return [
                    'id' => $candidate->id,
                    'no_urut' => $candidate->no_urut,
                    'name' => $candidate->name,
                    'votes' => $votes,
                    'percentage' => $percentage,
                    'background' => $theme['background'],
                    'card' => $theme['card'],
                    'badge' => $theme['badge'],
                    'text' => $theme['text'],
                    'bar' => $theme['bar'],
                ];
            })
            ->all();
    }

    #[Computed()]
    public function chartData(): array
    {
        return [
            'labels' => collect($this->candidateResults)
                ->map(fn (array $candidate): string =>  $candidate['no_urut'] . ' (' . $candidate['name'] . ')')
                ->values()
                ->all(),
            'datasets' => [[
                'data' => collect($this->candidateResults)
                    ->pluck('votes')
                    ->values()
                    ->all(),
                'backgroundColor' => collect($this->candidateResults)
                    ->pluck('background')
                    ->values()
                    ->all(),
                'borderColor' => '#ffffff',
                'borderWidth' => 4,
                'hoverOffset' => 6,
            ]],
            'totalVotes' => $this->totalVotes,
        ];
    }

    public function rendered(): void
    {
        $this->dispatch('votes-chart-updated', chartData: $this->chartData());
    }
};