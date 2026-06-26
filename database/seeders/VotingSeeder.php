<?php

namespace Database\Seeders;

use App\Models\Voting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voting::create([
            'voting_number' => 'V-0001',
            'participant_id' => '019efcc5-943e-70d3-ad39-81e69f24b706',
            'candidate_id' => '019efc99-be20-72b5-b8fe-255e5a0ab760',
            'voting_time' => now(),
        ]);
    }
}
