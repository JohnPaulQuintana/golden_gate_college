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
        Schema::table('liabilities', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('semester_id');
            $table->double('ammount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('liabilities', function (Blueprint $table) {
            $table->dropColumn('academic_year_id');
            $table->dropColumn('semester_id');
            $table->dropColumn('amount');

        });
    }
};
