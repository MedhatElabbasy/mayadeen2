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

        $statusB = [
            Survey::SOCIALMEDIA->value,
            Survey::BILLBOARDS->value,
            Survey::WEABSITE->value,
            Survey::FRIENDS->value,
        ];

        $statusC = [
            Survey::HIGH->value,
            Survey::MEDIUM->value,
            Survey::WEAK->value,
        ];

        Schema::create('surveys', function (Blueprint $table) use ($status, $statusB, $statusC) {
            $table->id();
            $table->enum('experience', $status);
            $table->enum('guidelines', $status);
            $table->enum('literaryEvents', $status);
            $table->enum('entertainmentEvents', $status);
            $table->enum('restaurant', $status);
            $table->json('rating')->nullable();
            $table->enum('referral', $statusB);
            $table->enum('next', $statusC);
            $table->enum('suggestion', $statusC);
            $table->longText('opinion')->nullable();
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
