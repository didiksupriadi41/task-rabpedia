<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpahTable extends Migration
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
                    if ($c == 2)
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
        $file = public_path('file/Monev_Data_Upah.csv');
        $upahArr = $this->csvToArray($file);
        foreach ($upahArr as $upah) {
            DB::table('upah')->insert(
                array(
                    'jenis_pekerja' => $upah[0],
                    'satuan' => $upah[1],
                    'harga_satuan' => $upah[2],
                    'cabang_itb' => $upah[3]
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
        Schema::create('upah', function (Blueprint $table) {
            $table->increments('id_upah');
            $table->string('jenis_pekerja');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('cabang_itb');
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('upah');
    }
}
