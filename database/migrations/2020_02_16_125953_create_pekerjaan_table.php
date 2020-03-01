<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanTable extends Migration
{
    public function csvToArray($filename = '', $delimiter = ',')
    {
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
                for ($c = 0; $c < $num; $c++) {
                    if ($c == 4)
                        $data[$i][] = (int) $filedata[$c];
                    else
                        $data[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($handle);
        }
        return $data;
    }

    public function importCsv()
    {
        $file = public_path('file/Monev_Data_Pekerjaan.csv');
        $pekerjaanArr = $this->csvToArray($file);
        foreach ($pekerjaanArr as $pekerjaan) {
            DB::table('pekerjaan')->insert(
                array(
                    'id_pekerjaan' => $pekerjaan[0],
                    'jenis_pekerjaan' => $pekerjaan[1],
                    'spesifikasi_teknis' => $pekerjaan[2],
                    'satuan' => $pekerjaan[3],
                    'harga_satuan' => $pekerjaan[4],
                    'cabang_itb' => $pekerjaan[5]
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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pekerjaan');
            $table->string('jenis_pekerjaan');
            $table->string('spesifikasi_teknis', 1300);
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('cabang_itb');
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
        Schema::dropIfExists('pekerjaan');
    }
}
