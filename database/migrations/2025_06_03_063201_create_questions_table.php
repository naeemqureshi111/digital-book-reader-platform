<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // migration: create_questions_table.php
    public function up(): void
    {
        
       Schema::create('questions', function (Blueprint $table) {
    $table->id();
    $table->string('question_text');
    $table->string('option_a');
    $table->string('option_b');
    $table->string('option_c');
    $table->string('option_d');
    $table->string('correct_option');
    $table->string('image_photo_url')->nullable();

    $table->unsignedBigInteger('classroom_id');
    $table->foreign('classroom_id')->references('id')->on('classes')->onDelete('cascade');

    $table->unsignedBigInteger('chapter_id');
    $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');

    $table->unsignedBigInteger('subject_id');
    $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('admin_id')->nullable();

    $table->timestamps();
});

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
