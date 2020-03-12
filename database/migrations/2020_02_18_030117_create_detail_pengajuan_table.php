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
            $table->increments('id');
            $table->integer('id_pengajuan')->unsigned();
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
            $table->integer('id_pekerjaan')->unsigned();
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaan');
            $table->string('no_gambar');
            $table->decimal('volume', 15, 2);
            $table->decimal('jumlah_harga', 15, 2);
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
