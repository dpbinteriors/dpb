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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->json('title');

            $table->text('image_path')->nullable();

            $table->text('description')->nullable();

            $table->smallInteger('position')->default(1);
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();
            $table->commonRecordFields();
        });

        Schema::create('document_files', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->text('path')->nullable();

            $table->foreignIdFor(\App\Models\Document::class)->constrained()->onDelete('cascade');;
            $table->smallInteger('position')->default(1);
            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_files');
        Schema::dropIfExists('documents');
    }
};
