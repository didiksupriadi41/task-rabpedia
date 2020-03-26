<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanMaterialInsertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_material_insert', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_material');
            $table->float('volume');
            $table->string('satuan');
            $table->decimal('harga_pembanding', 15, 2);
            $table->decimal('harga_saat_ini', 15, 2);
            $table->decimal('harga_satuan', 15, 2);
            $table->string('keterangan_tambahan')->nullable();
            $table->string('cabang_itb');
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
        Schema::dropIfExists('pengajuan_material_insert');
    }
}
