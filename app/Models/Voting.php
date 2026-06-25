<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
