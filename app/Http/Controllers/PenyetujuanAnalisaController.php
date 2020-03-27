<?php

namespace App\Http\Controllers;

use App\PengajuanAnalisaDelete;
use App\PengajuanAnalisaInsert;
use App\PengajuanAnalisaUpdate;

class PenyetujuanAnalisaController extends Controller
{
    public function showAll()
    {
        $analisa_insert = PengajuanAnalisaInsert::all();
        $analisa_update = PengajuanAnalisaUpdate::all();
        $analisa_delete = PengajuanAnalisaDelete::all();

        return view('unitkerja.persetujuan.ditlog.analisa', [
            'analisa_insert' => $analisa_insert,
            'analisa_update' => $analisa_update,
            'analisa_delete' => $analisa_delete
        ]);
    }
}
