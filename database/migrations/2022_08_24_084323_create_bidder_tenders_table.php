<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidderTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidder_tenders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_vendor')->unsigned();
            $table->bigInteger('id_tendor')->unsigned();
            $table->string('harga_bidder', 12);
            $table->string('tanggal_bidder', 12);
            $table->string('update_bidder', 12);
            $table->string('tanggal_update_bidder', 12);
            $table->string('statusBidder', 12);
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
        Schema::dropIfExists('bidder_tenders');
    }
}
