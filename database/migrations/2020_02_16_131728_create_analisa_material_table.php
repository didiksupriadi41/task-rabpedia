<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_material', function (Blueprint $table) {
            $table->increments('id_analisa_material');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('pekerjaan');
            $table->integer('id_material')->unsigned();
            $table->foreign('id_material')->references('id_material')->on('material');
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
        Schema::dropIfExists('analisa_material');
    }
}
