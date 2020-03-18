<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanBahanInsertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_bahan_insert', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_bahan_bangunan');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('kelompok_bahan');
            $table->string('cabang_itb');
            $table->integer('id_pengaju')->unsigned();
            $table->foreign('id_pengaju')->references('id')->on('sso_users');
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
        Schema::dropIfExists('pengajuan_bahan_insert');
    }
}
