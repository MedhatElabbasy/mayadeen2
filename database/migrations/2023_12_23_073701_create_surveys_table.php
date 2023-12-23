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
        $status = [
            Survey::VERY_SATISFIED->value,
            Survey::SATISFIED->value,
            Survey::NEUTRAL->value,
            Survey::UPSET->value,
            Survey::VERY_UPSET->value
        ];

        Schema::create('surveys', function (Blueprint $table) use ($status) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('facilities', $status);
            $table->enum('organization', $status);
            $table->enum('events', $status);
            $table->enum('access', $status);
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
