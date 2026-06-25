<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
