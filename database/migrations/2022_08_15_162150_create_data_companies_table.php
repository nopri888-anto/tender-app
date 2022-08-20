<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('namaPerusahaan',50)->nullable();
            $table->string('alamat',100)->nullable();
            $table->string('kab',35)->nullable();
            $table->string('provinsi',50)->nullable();
            $table->string('kodepos',6)->nullable();
            $table->string('notelp',13)->nullable();
            $table->string('email',50)->nullable();
            $table->string('npwp',16)->nullable();
            $table->string('status',1)->nullable();
            $table->bigInteger('id_user')->unsigned();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_companies');
    }
}
