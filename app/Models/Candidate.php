<?php

namespace App\Models;

use App\Jobs\BroadcastVotingUpdatedJob;
use App\Jobs\UpdateCandidateTallyCacheJob;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Candidate extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'no_urut',
        'name',
        'title',
        'photo',
        'vision',
        'mission',
        'description',
    ];

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }

    protected static function booted(): void
    {
        static::created(fn () => self::dispatchCandidateRefreshJobs());
        static::updated(fn () => self::dispatchCandidateRefreshJobs());
        static::deleted(fn () => self::dispatchCandidateRefreshJobs());
        static::restored(fn () => self::dispatchCandidateRefreshJobs());
        static::forceDeleted(fn () => self::dispatchCandidateRefreshJobs());
    }

    protected static function dispatchCandidateRefreshJobs(): void
    {
        try {
            UpdateCandidateTallyCacheJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');

            BroadcastVotingUpdatedJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');
        } catch (\Throwable $exception) {
            Log::warning('Failed dispatching candidate refresh jobs', [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
