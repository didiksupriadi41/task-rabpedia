<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanAnalisaUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_analisa_update', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_analisa');
            $table->integer('id_analisa'); //Untuk ID Analisa yang akan didelete
            $table->decimal('koefisien', 15, 4);
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
        Schema::dropIfExists('pengajuan_analisa_update');
    }
}
