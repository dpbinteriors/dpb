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
        Schema::create('works_categories', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('caption')->nullable();
            $table->smallInteger('order')->default(1);
            $table->json('slug');
            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works_categories');
    }
};
