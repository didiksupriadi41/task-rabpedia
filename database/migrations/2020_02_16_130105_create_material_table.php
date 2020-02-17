<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id_material');
            $table->string('item_material');
            $table->float('volume');
            $table->string('satuan');
            $table->decimal('harga_pembanding', 15, 2);
            $table->decimal('harga_saat_ini', 15, 2);
            $table->decimal('harga_satuan', 15, 2);
            $table->string('ketengan_tambahan')->nullable();
            $table->string('cabang_itb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material');
    }
}
