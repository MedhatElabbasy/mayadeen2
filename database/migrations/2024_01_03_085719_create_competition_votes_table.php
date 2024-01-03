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
        $rounds = [1, 2];

        Schema::create('competition_votes', function (Blueprint $table) use ($rounds) {
            $table->id();
            $table->enum('team', $rounds);
            $table->enum('round', $rounds);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_votes');
    }
};
