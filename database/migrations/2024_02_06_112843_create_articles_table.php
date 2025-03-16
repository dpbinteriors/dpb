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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->json('title');
            $table->json('caption')->nullable();
            $table->json('description')->nullable();
            $table->json('slug');
            $table->boolean('is_promoted')->default(false);
            $table->text('image_path')->nullable();
            $table->text('second_image_path')->nullable();
            $table->text('gallery')->nullable();
            $table->smallInteger('position')->default(1);

            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
