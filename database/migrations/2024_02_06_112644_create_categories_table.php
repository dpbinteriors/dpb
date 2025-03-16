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
        Schema::create('category_types', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('key');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->json('title');
            $table->json('caption')->nullable();
            $table->json('description')->nullable();
            $table->json('slug');
            $table->text('image_path')->nullable();

            $table->text('second_image_path')->nullable();
            $table->text('icon_path')->nullable();
            $table->text('image_gallery')->nullable();
            $table->boolean('is_promoted')->default(false);

            $table->smallInteger('position')->default(1);

            $table->foreignId('connected_category_id')->nullable();
            $table->foreign('connected_category_id')->references('id')->on('categories')->restrictOnDelete();

            $table->foreignId('category_type_id');
            $table->foreign('category_type_id')->references('id')->on('category_types')->restrictOnDelete();

            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_types');
    }
};
