<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuctionHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_history', function (Blueprint $table) {
            $table->id('id_history');
            $table->BigInteger('id_bids')->unsigned();
            $table->BigInteger('id_user')->unsigned();
            $table->BigInteger('bid');
            $table->enum('auction_status',['delayed','selected','not_selected']);
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
        //
    }
}
