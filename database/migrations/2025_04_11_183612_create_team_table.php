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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->text('image');
            $table->json('position_name');
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('behance_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
