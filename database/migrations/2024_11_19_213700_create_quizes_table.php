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
        Schema::create('quizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->bigInteger('score')->default(0);
            $table->bigInteger('lp')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizes');
    }
};
