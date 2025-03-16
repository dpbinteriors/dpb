<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_image');  
            $table->string('title');  
            $table->text('description');  
            $table->string('button_text');  
            $table->string('button_url');  
            $table->date('campaign_start_date');
            $table->date('campaign_end_date');    
            $table->smallInteger('position')->default(1);

            $table->commonRecordFields();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
