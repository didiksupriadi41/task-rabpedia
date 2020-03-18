<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanMaterialDeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_material_delete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_material_delete')->unsigned();
            $table->foreign('id_material_delete')->references('id_material')->on('material');
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
        Schema::dropIfExists('pengajuan_material_delete');
    }
}
