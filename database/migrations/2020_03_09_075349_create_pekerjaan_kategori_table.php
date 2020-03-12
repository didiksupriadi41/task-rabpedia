<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanKategoriTable extends Migration
{
    public function csvToArray($filename = '', $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return 1;
        $i = 0;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($filedata = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $num = count($filedata);
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for($c = 0; $c < $num; $c++){
                    if($c == 4)
                        $data[$i][] = (int) $filedata[$c];
                    else 
                        $data[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($handle);
        }
        return $data;
    }

    public function importCsv() {
        $file = public_path('file/Monev_Data_Pekerjaan_Kategori.csv');
        $pekerjaanKategoriArr = $this->csvToArray($file);
        foreach ($pekerjaanKategoriArr as $pekerjaan_kategori){
            DB::table('pekerjaan_kategori')->insert(
                array(
                    'id_kategori'=>$pekerjaan_kategori[0],
                    'nama_kategori'=>$pekerjaan_kategori[1],
                )
            );
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kategori');
            $table->string('nama_kategori');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });

        $this->importCsv();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaan_kategori');
    }
}
