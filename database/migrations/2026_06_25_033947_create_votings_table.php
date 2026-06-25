<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('votings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('voting_number')->unique();
            $table->foreignUuid('participant_id')->constrained('participants')->nullOnDelete();
            $table->foreignUuid('candidate_id')->constrained('candidates')->nullOnDelete();
            $table->timestamp('voting_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votings');
    }
};
