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
        Schema::table('slides', function (Blueprint $table) {
            $table->text('video')->nullable()->after('image'); // video alanı
            $table->string('type')->nullable()->after('video'); // metin alanı
            $table->json('slogan')->nullable()->after('type'); // JSON alanı
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn(['video', 'type', 'slogan']);
        });
    }
};
