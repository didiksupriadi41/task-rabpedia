<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->increments('id_detail_pengajuan');
            $table->integer('id_pengajuan')->unsigned();
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
            $table->string('nama_pekerjaan');
            $table->string('spesifikasi', 1200);
            $table->string('kode_pekerjaan');
            $table->string('no_gambar');
            $table->decimal('volume', 15, 2);
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('kategori_I', 1000);
            $table->string('kategori_II', 1000);
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
        Schema::dropIfExists('detail_pengajuan');
    }
}
