<?php

namespace App\Models;

use App\Jobs\BroadcastVotingUpdatedJob;
use App\Jobs\RecalculateVotingSummaryJob;
use App\Jobs\UpdateCandidateTallyCacheJob;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Voting extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'voting_number',
        'participant_id',
        'candidate_id',
        'voting_time',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    protected static function booted(): void
    {
        static::created(fn () => self::dispatchVotingRefreshJobs());
        static::deleted(fn () => self::dispatchVotingRefreshJobs());
        static::restored(fn () => self::dispatchVotingRefreshJobs());
        static::forceDeleted(fn () => self::dispatchVotingRefreshJobs());
    }

    protected static function dispatchVotingRefreshJobs(): void
    {
        try {
            RecalculateVotingSummaryJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');

            UpdateCandidateTallyCacheJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');

            BroadcastVotingUpdatedJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');
        } catch (\Throwable $exception) {
            Log::warning('Failed dispatching voting refresh jobs', [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
