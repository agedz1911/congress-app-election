<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class BroadcastVotingUpdatedJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public const CACHE_KEY = 'voting.dashboard.last_update';

    public int $tries = 2;
    public int $timeout = 15;

    public function handle(): void
    {
        // This cache flag can be consumed by broadcasting or monitoring later.
        Cache::forever(self::CACHE_KEY, now()->toDateTimeString());
    }
}
