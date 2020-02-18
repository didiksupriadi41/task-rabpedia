<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upah', function (Blueprint $table) {
            $table->increments('id_upah');
            $table->string('jenis_pekerja');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
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
        Schema::dropIfExists('upah');
    }
}
