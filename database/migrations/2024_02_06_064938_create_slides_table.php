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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('second_image')->nullable();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('button_text');
            $table->string('button_url')->nullable();
            $table->smallInteger('position')->default(1);

            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
