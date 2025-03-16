<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenericCrudMigration extends Migration
{
    protected function crudColumns(Blueprint $table)
    {
        $table->json('description')->nullable();
        $table->json('button_text');
        $table->string('button_url')->nullable();
    }
}
