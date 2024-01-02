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
        Schema::create('surveycompetitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id');
            $table->string('name')->nullable();
            $table->timestamps();

            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
        });


        // Schema::create('surveycompetitions_rounds', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('surveycompetition_id');
        //     $table->string('name');
        //     $table->timestamps();

        //     $table->foreign('surveycompetition_id')->references('id')->on('surveycompetitions')->onDelete('cascade');
        // });



        // Schema::create('surveycompetition_votes', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('surveycompetition_round_id');
        //     $table->unsignedBigInteger('team_id');
        //     $table->timestamps();

        //     $table->foreign('surveycompetition_round_id')->references('id')->on('surveycompetition_rounds')->onDelete('cascade');
        //     $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveycompetitions');
        // Schema::dropIfExists('surveycompetitions_rounds');
        // Schema::dropIfExists('surveycompetitions_votes');

    }
};