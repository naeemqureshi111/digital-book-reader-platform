<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('instructions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('class_id');
        $table->text('content'); // stores HTML/text content
        $table->timestamps();

        $table->unique(['subject_id', 'class_id']); // only one instruction per pair
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
