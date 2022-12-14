<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_companies', function (Blueprint $table) {
            $table->id();
            $table->string('npwp', 150);
            $table->string('aktaUsaha', 150);
            $table->string('dokumenIndukUsaha', 150);
            $table->string('nomorIndukUsaha', 150);
            $table->string('workshop', 150);
            $table->string('suratPeryantaan', 150);
            $table->string('suratPendaftaran', 150);

            $table->bigInteger('id_biodata')->unsigned();
            $table->timestamps();
            $table->foreign('id_biodata')->references('id')->on('data_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_companies');
    }
}
