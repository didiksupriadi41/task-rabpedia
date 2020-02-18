<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan', function (Blueprint $table) {
            $table->increments('id_bahan');
            $table->string('jenis_bahan_bangunan');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('kelompok_bahan');
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
        Schema::dropIfExists('bahan');
    }
}
