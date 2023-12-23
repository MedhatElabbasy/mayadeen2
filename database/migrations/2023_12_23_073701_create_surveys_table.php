<?php

use App\Enums\Survey;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('facilities', [Survey::VERY_SATISFIED->value, Survey::SATISFIED->value, Survey::NEUTRAL->value, Survey::UPSET->value, Survey::VERY_UPSET->value]);
            $table->enum('organization', [Survey::VERY_SATISFIED->value, Survey::SATISFIED->value, Survey::NEUTRAL->value, Survey::UPSET->value, Survey::VERY_UPSET->value]);
            $table->enum('events', [Survey::VERY_SATISFIED->value, Survey::SATISFIED->value, Survey::NEUTRAL->value, Survey::UPSET->value, Survey::VERY_UPSET->value]);
            $table->enum('access', [Survey::VERY_SATISFIED->value, Survey::SATISFIED->value, Survey::NEUTRAL->value, Survey::UPSET->value, Survey::VERY_UPSET->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
