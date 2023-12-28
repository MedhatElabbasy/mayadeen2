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
        Schema::create('dates_of_poems', function (Blueprint $table) {
            $table->id();
            $table->string('owner')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('details')->nullable();
            $table->enum('type', ['nabati', 'fosha'])->default('nabati');
            $table->boolean('is_break')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dates_of_poems');
    }
};
