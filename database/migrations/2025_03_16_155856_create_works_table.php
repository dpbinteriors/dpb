<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')  // category_id sütunu burada ekleniyor
            ->constrained('works_categories') // works_categories tablosundaki id'ye referans
            ->onDelete('cascade'); // Silme işlemi sırasında kaskad davranışı
            $table->json('title'); // Başlık
            $table->text('image_path'); // Görsel yolu
            $table->json('caption'); // Açıklama
            $table->json('description')->nullable();  // description sütunu eklendi
            $table->json('style'); // Stil
            $table->smallInteger(column: 'order')->default(1);
            $table->json('slug');
            $table->boolean(column: 'is_promoted')->default(false);  // is_promoted sütunu eklendi
            $table->json('tag'); // Etiket
            $table->commonRecordFields();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
