<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaUpahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_upah', function (Blueprint $table) {
            $table->increments('id_analisa_upah');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('pekerjaan');
            $table->integer('id_upah')->unsigned();
            $table->foreign('id_upah')->references('id_upah')->on('upah');
            $table->decimal('koefisien', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisa_upah');
    }
}
