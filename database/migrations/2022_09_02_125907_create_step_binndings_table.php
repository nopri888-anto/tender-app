<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepBinndingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stepBinding', function (Blueprint $table) {
            $table->id();
            $table->string('nameStep', 200);
            $table->string('startDate', 10);
            $table->string('finishDate', 10);
            $table->bigInteger('id_binding')->unsigned();
            $table->timestamps();

            $table->foreign('id_binding')->references('id')->on('tender_modals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_binndings');
    }
}
