<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanBahanUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_bahan_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bahan_update')->unsigned();
            $table->foreign('id_bahan_update')->references('id_bahan')->on('bahan');
            $table->string('jenis_bahan_bangunan');
            $table->decimal('harga_satuan', 15, 2);
            $table->integer('id_pengaju')->nullable();
            // $table->integer('id_pengaju')->unsigned();
            // $table->foreign('id_pengaju')->references('id')->on('sso_users');
            $table->string('komentar', 2000);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_bahan_update');
    }
}
