<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biddings', function (Blueprint $table) {
            $table->id('id_bid');
            $table->BigInteger('id_products')->unsigned();
            $table->BigInteger('id_catss')->unsigned();
            $table->datetime('date_bid_start');
            $table->datetime('date_bid_end');
            $table->BigInteger('last_bid')->default('0');
            $table->integer('id_bidders')->default('0');
            $table->integer('id_officers');
            $table->enum('status',['open','closed'])->default('closed');
            $table->timestamp('created_at');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biddings');
    }
}
