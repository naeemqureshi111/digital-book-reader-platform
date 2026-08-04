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
    Schema::create('subject_links', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('class_id');
        $table->string('random_code')->unique(); // e.g., 87569
        $table->timestamps();

        $table->unique(['subject_id', 'class_id']); // ensure each pair only once
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_links');
    }
};
