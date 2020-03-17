<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnalisaDetailPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_detail_pengajuan', function (Blueprint $table) {
            $table->increments('id_analisa_detail_pengajuan');
            $table->integer('id_detail_pengajuan')->unsigned();
            $table->foreign('id_detail_pengajuan')->references('id_detail_pengajuan')->on('detail_pengajuan');
            $table->string('nama_bahan_material_upah');
            $table->decimal('koefisien', 15, 2);
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
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
        Schema::dropIfExists('analisa_detail_pengajuan');
    }
}
