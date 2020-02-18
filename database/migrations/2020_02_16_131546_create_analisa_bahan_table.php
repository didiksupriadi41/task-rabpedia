<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_bahan', function (Blueprint $table) {
            $table->increments('id_analisa_bahan');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('pekerjaan');
            $table->integer('id_bahan')->unsigned();
            $table->foreign('id_bahan')->references('id_bahan')->on('bahan');
            $table->decimal('koefisien', 15, 2);
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
        Schema::dropIfExists('analisa_bahan');
    }
}
