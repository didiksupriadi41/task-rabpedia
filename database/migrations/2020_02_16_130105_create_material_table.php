<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialTable extends Migration
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
                    if ($c == 1) {
                        $data[$i][] = (float) $filedata[$c];
                    } else if ($c == 3 || $c == 4 || $c == 5) {
                        $data[$i][] = (int) $filedata[$c];
                    } else {
                        $data[$i][] = $filedata[$c];
                    }
                }
                $i++;
            }
            fclose($handle);
        }
        return $data;
    }

    public function importCsv()
    {
        $file = public_path('file/Monev_Data_Material.csv');
        $materialArr = $this->csvToArray($file);
        foreach ($materialArr as $material) {
            DB::table('material')->insert(
                array(
                    'item_material' => $material[0],
                    'volume' => $material[1],
                    'satuan' => $material[2],
                    'harga_pembanding' => $material[3],
                    'harga_saat_ini' => $material[4],
                    'harga_satuan' => $material[5],
                    'keterangan_tambahan' => $material[6],
                    'cabang_itb' => $material[7]
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
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id_material');
            $table->string('item_material');
            $table->float('volume');
            $table->string('satuan');
            $table->decimal('harga_pembanding', 15, 2);
            $table->decimal('harga_saat_ini', 15, 2);
            $table->decimal('harga_satuan', 15, 2);
            $table->string('keterangan_tambahan')->nullable();
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
        Schema::dropIfExists('material');
    }
}
