<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaUpahTable extends Migration
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
        $file = public_path('file/Monev_Data_Analisa_Upah.csv');
        $analisaupahArr = $this->csvToArray($file);
        foreach ($analisaupahArr as $analisaupah) {
            DB::table('analisa_upah')->insert(
                array(
                    'id' => $analisaupah[0],
                    'id_upah' => $analisaupah[1],
                    'koefisien' => $analisaupah[2],
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
        Schema::create('analisa_upah', function (Blueprint $table) {
            $table->increments('id_analisa_upah');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('pekerjaan');
            $table->integer('id_upah')->unsigned();
            $table->foreign('id_upah')->references('id_upah')->on('upah');
            $table->decimal('koefisien', 15, 4);
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
        Schema::dropIfExists('analisa_upah');
    }
}
