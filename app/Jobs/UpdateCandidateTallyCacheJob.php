<?php

namespace App\Jobs;

use App\Models\Candidate;
use App\Models\Voting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class UpdateCandidateTallyCacheJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public const CACHE_KEY = 'voting.dashboard.candidate_results';

    public int $tries = 3;
    public int $timeout = 30;

    public function handle(): void
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

        $totalVotes = Voting::count();

        $candidateResults = Candidate::query()
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

        Cache::forever(self::CACHE_KEY, $candidateResults);
    }
}
