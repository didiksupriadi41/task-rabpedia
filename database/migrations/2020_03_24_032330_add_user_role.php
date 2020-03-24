<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
        });

        $this->seedRole();

        Schema::table('sso_users', function (Blueprint $table) {
            $table->integer('role_id')->references('id')->on('role')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
        Schema::table('sso_users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }

    private function seedRole()
    {
        DB::table('role')->insert([
            ['role_name' => 'unit kerja'],
            ['role_name' => 'admin']
        ]);
    }
}
