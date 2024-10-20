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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('student_no')->unique(); // Unique student number
            $table->foreignId('program_id')->constrained()->onDelete('cascade'); // Associate with course
            $table->foreignId('semester_id')->constrained()->onDelete('cascade'); // Associate with semester
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Associate with user
            $table->foreignId('academic_year_id')->constrained()->onDelete('cascade'); // Associate with academic year
            $table->foreignId('year_level_with_subject_id')->constrained()->onDelete('cascade'); // Associate with academic year
            $table->string('fullname');
            $table->enum('gender', ['male', 'female', 'other']); // Gender options
            $table->string('contact_number')->nullable(); // Contact number
            $table->string('civil_status')->nullable(); // Civil status
            $table->string('nationality')->nullable(); // Nationality
            $table->date('date_of_birth'); // Date of birth
            $table->string('place_of_birth')->nullable(); // Place of birth
            $table->unsignedInteger('age')->nullable(); // Age
            $table->string('guardian_fullname')->nullable(); // Guardian's fullname
            $table->text('address')->nullable(); // Address
            $table->string('elementary')->nullable(); // Elementary school
            $table->year('elementary_year')->nullable(); // Elementary graduation year
            $table->string('secondary')->nullable(); // Secondary school
            $table->year('secondary_year')->nullable(); // Secondary graduation year
            $table->string('senior_high')->nullable(); // Senior high school
            $table->year('senior_high_year')->nullable(); // Senior high graduation year
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
