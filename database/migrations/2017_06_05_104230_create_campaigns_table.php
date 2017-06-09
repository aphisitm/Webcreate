<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('campaigns_id');
            $table->string('title');
            $table->string('detail');
            $table->string('product_url');
            $table->integer('minprice')->default(11);
            $table->integer('maxprice')->default(11);
            $table->string('productimg');
            $table->dateTime('deadline');
            $table->integer('status');
            $table->timestamps();
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
