<?php

namespace App\Jobs;

use App\Models\Participant;
use App\Models\Voting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class RecalculateVotingSummaryJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public const CACHE_KEY = 'voting.dashboard.summary';

    public int $tries = 3;
    public int $timeout = 30;

    public function handle(): void
    {
        $totalParticipants = Participant::count();
        $totalVotes = Voting::count();
        $notVotedYet = max($totalParticipants - $totalVotes, 0);
        $participationRate = $totalParticipants > 0
            ? round(($totalVotes / $totalParticipants) * 100, 2)
            : 0;

        Cache::forever(self::CACHE_KEY, [
            'total_participants' => $totalParticipants,
            'total_votes' => $totalVotes,
            'not_voted_yet' => $notVotedYet,
            'participation_rate' => $participationRate,
            'last_updated_at' => now()->toDateTimeString(),
        ]);
    }
}
