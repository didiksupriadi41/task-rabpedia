<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanTable extends Migration
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
                    if($c == 2)
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
        $file = public_path('file\Monev_Data_Bahan.csv');
        $bahanArr = $this->csvToArray($file);
        foreach ($bahanArr as $bahan){
            DB::table('bahan')->insert(
                array(
                    'jenis_bahan_bangunan'=>$bahan[0],
                    'satuan'=>$bahan[1],
                    'harga_satuan'=>$bahan[2],
                    'kelompok_bahan'=>$bahan[3],
                    'cabang_itb'=>$bahan[4]
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
        Schema::create('bahan', function (Blueprint $table) {
            $table->increments('id_bahan');
            $table->string('jenis_bahan_bangunan');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('kelompok_bahan');
            $table->string('cabang_itb');
            $table->timestamps();
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
        Schema::dropIfExists('bahan');
    }
}
