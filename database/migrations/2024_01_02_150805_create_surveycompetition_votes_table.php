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
        Schema::create('surveycompetition_votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveycompetition_round_id');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();

            $table->foreign('surveycompetition_round_id')->references('id')->on('surveycompetitions_rounds')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveycompetition_votes');
    }
};