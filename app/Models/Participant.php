<?php

namespace App\Models;

use App\Jobs\RecalculateVotingSummaryJob;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Participant extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'full_name',
        'title_specialization',
        'type',
        'member_id',
        'participant_number',
        'email',
        'phone_number',
        'institution',
        'country',
        'participant_category',
    ];

    public function voting()
    {
        return $this->hasOne(Voting::class);
    }

    protected static function booted(): void
    {
        static::created(fn () => self::dispatchSummaryRefreshJob());
        static::deleted(fn () => self::dispatchSummaryRefreshJob());
        static::restored(fn () => self::dispatchSummaryRefreshJob());
        static::forceDeleted(fn () => self::dispatchSummaryRefreshJob());
    }

    protected static function dispatchSummaryRefreshJob(): void
    {
        try {
            RecalculateVotingSummaryJob::dispatch()
                ->afterCommit()
                ->onQueue('realtime');
        } catch (\Throwable $exception) {
            Log::warning('Failed dispatching participant summary refresh job', [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
