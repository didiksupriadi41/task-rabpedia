<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pekerjaan');
            $table->string('jenis_pekerjaan');
            $table->string('spesifikasi_teknis');
            $table->string('satuan');
            $table->decimal('harga_satuan');
            $table->string('cabang_itb');
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
        Schema::dropIfExists('pekerjaan');
    }
}
