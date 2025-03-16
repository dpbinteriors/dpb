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
        // Create Products Table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->json('title');
            $table->boolean('is_promoted')->default(false);
            $table->json('caption')->nullable();
            $table->json('description')->nullable();

            $table->json('slug');
            $table->smallInteger('position')->default(1);

            $table->text('image_path')->nullable();
            $table->text('second_image_path')->nullable();
            $table->text('image_gallery')->nullable();

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->commonRecordFields();
        });

        // Create applications table
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->json('title');
            $table->json('slug')->nullable();
            $table->json('caption')->nullable();
            $table->json('description')->nullable();

            $table->string('image_path')->nullable();
            $table->text('image_gallery')->nullable();
            $table->smallInteger('position')->default(1);

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->commonRecordFields();
        });

        // Create product_application table
        Schema::create('product_application', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id');
            $table->foreignId('application_id');
            $table->json('description')->nullable();
            $table->smallInteger('position')->default(1);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_application');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('products');
    }
};
