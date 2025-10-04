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
        Schema::create('collegian_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collegian_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('collegian_id')->references('id')->on('collegians');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collegian_course');
    }
};
