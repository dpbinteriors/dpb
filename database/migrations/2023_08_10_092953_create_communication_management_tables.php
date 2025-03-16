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
//        Schema::create('communication_forms', function (Blueprint $table) {
//            $table->id();
//            $table->string('title');
//            $table->string('send_to');
//            $table->text('cc_to')->nullable();
//            $table->text('bcc_to')->nullable();
//            $table->string('key')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('communication_instances', function (Blueprint $table) {
//            $table->id();
//            $table->text('body');
//            $table->foreignId('communication_form_id')->constrained('communication_forms')->cascadeOnDelete();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('communication_instances');
//        Schema::dropIfExists('communication_forms');
    }
};
