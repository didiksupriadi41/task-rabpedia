<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePengajuanAnalisaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_analisa_delete', function (Blueprint $table) {
            $table->integer('id_pekerjaan');
        });

        Schema::table('pengajuan_analisa_update', function (Blueprint $table) {
            $table->integer('id_pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_analisa_delete', function (Blueprint $table) {
            $table->dropColumn('id_pekerjaan');
        });

        Schema::table('pengajuan_analisa_update', function (Blueprint $table) {
            $table->dropColumn('id_pekerjaan');
        });
    }
}
