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
        Schema::create('year_level_with_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Associate with academic year
            $table->foreignId('program_id')->constrained(); // Associate with academic year
            $table->integer('year_level');
            $table->json('selected_subject_ids'); // Store as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_level_with_subjects');
    }
};
