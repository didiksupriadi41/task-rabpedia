<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanMaterialUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_material_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_material_update')->unsigned();
            $table->foreign('id_material_update')->references('id_material')->on('material');
            $table->string('item_material');
            $table->float('volume');
            $table->decimal('harga_pembanding', 15, 2);
            $table->decimal('harga_saat_ini', 15, 2);
            $table->decimal('harga_satuan', 15, 2);
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
        Schema::dropIfExists('pengajuan_material_update');
    }
}
