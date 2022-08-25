<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_modals', function (Blueprint $table) {
            $table->id();
            $table->string('kodeTender', 15);
            $table->string('namaTender', 100);
            $table->string('tanggalTender', 15);
            $table->string('tanggalMulaiTender', 15);
            $table->string('tanggalSelesaiTender', 15);
            $table->string('satuanKerja', 50);
            $table->string('lokasiLelang', 150);
            $table->string('kab', 100);
            $table->string('provinsi', 100);
            $table->string('nilaiPagu', 12);
            $table->string('nilaiHps', 12);
            $table->string('statusTender', 50);
            $table->string('jenisKontrak', 50);
            // $table->bigInteger('id_vendor')->unsigned();
            $table->timestamps();

            // $table->foreign('id_vendor')->references('id')->on('data_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tender_modals');
    }
}
