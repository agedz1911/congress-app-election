<?php

use App\Jobs\RecalculateVotingSummaryJob;
use App\Jobs\UpdateCandidateTallyCacheJob;
use App\Models\Candidate;
use App\Models\Participant;
use App\Models\Voting;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed()]
    public function summary(): array
    {
        return Cache::rememberForever(RecalculateVotingSummaryJob::CACHE_KEY, function (): array {
            $totalParticipants = Participant::count();
            $totalVotes = Voting::count();

            return [
                'total_participants' => $totalParticipants,
                'total_votes' => $totalVotes,
                'not_voted_yet' => max($totalParticipants - $totalVotes, 0),
                'participation_rate' => $totalParticipants > 0
                    ? round(($totalVotes / $totalParticipants) * 100, 2)
                    : 0,
                'last_updated_at' => now()->toDateTimeString(),
            ];
        });
    }

    #[Computed()]
    public function totalParticipants(): int
    {
        return (int) data_get($this->summary, 'total_participants', 0);
    }

    #[Computed()]
    public function totalVotes(): int
    {
        return (int) data_get($this->summary, 'total_votes', 0);
    }

    #[Computed()]
    public function notVotedYet(): int
    {
        return (int) data_get($this->summary, 'not_voted_yet', 0);
    }

    #[Computed()]
    public function participationRate(): float
    {
        return (float) data_get($this->summary, 'participation_rate', 0);
    }

    #[Computed()]
    public function candidateResults(): array
    {
        return Cache::rememberForever(UpdateCandidateTallyCacheJob::CACHE_KEY, function (): array {
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

            $totalVotes = Voting::count();

            return Candidate::query()
                ->withCount('votings')
                ->orderBy('no_urut')
                ->get()
                ->values()
                ->map(function (Candidate $candidate, int $index) use ($palette, $totalVotes): array {
                    $theme = $palette[$index % count($palette)];
                    $votes = (int) $candidate->votings_count;
                    $percentage = $totalVotes > 0
                        ? round(($votes / $totalVotes) * 100, 2)
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
        });
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