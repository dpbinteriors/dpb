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
        Schema::create('residential_rooms', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->text('image');
            $table->boolean(column: 'is_promoted')->default(false);  // is_promoted sütunu eklendi
            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residential_rooms');
    }
};
