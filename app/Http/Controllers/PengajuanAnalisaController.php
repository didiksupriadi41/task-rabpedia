<?php

namespace App\Http\Controllers;

use App\AnalisaBahan;
use App\AnalisaMaterial;
use App\AnalisaUpah;
use App\Bahan;
use App\Material;
use App\Pekerjaan;
use App\Upah;
use Illuminate\Http\Request;

function mapping($template, $content)
{
    $ret = [];
    for ($i = 0; $i < count($template); $i++) {
        $ret[$template[$i]] = $content[$i];
    }
    return $ret;
}

class PengajuanAnalisaController extends Controller
{
    public function showForm($id)
    {
        $analisis_template = ["ID", "Tipe", "Bahan-Upah-Material", "Koefisien", "Satuan", "Harga Satuan"];

        $pekerjaan = Pekerjaan::find($id)->toArray();
        $pekerjaan['analisis'] = [];

        $bahan = Bahan::all();
        $upah = Upah::all();
        $material = Material::all();

        $list_analisa_bahan = AnalisaBahan::where('id', $id)->get();
        $list_analisa_upah = AnalisaUpah::where('id', $id)->get();
        $list_analisa_material = AnalisaMaterial::where('id', $id)->get();

        foreach ($list_analisa_bahan as $analisa_bahan) {
            array_push($pekerjaan['analisis'], mapping($analisis_template, [
                $analisa_bahan->id_analisa_bahan,
                'bahan',
                $analisa_bahan->bahan->jenis_bahan_bangunan,
                number_format($analisa_bahan->koefisien, 4),
                $analisa_bahan->bahan->satuan,
                number_format($analisa_bahan->bahan->harga_satuan, 2)
            ]));
        }
        foreach ($list_analisa_upah as $analisa_upah) {
            array_push($pekerjaan['analisis'], mapping($analisis_template, [
                $analisa_upah->id_analisa_upah,
                'upah',
                $analisa_upah->upah->jenis_pekerja,
                number_format($analisa_upah->koefisien, 4),
                $analisa_upah->upah->satuan,
                number_format($analisa_upah->upah->harga_satuan, 2)
            ]));
        }
        foreach ($list_analisa_material as $analisa_material) {
            array_push($pekerjaan['analisis'], mapping($analisis_template, [
                $analisa_material->id_analisa_material,
                'material',
                $analisa_material->material->item_material,
                number_format($analisa_material->koefisien, 4),
                $analisa_material->material->satuan,
                number_format($analisa_material->material->harga_satuan, 2)
            ]));
        }

        return view('unitkerja.penambahan.user.analisa', [
            'pekerjaan' => $pekerjaan,
            'bahan' => $bahan,
            'upah' => $upah,
            'material' => $material
        ]);
    }

    public function submitForm(Request $request, $id)
    {
        echo '<pre>' . var_export($request->data, true) . '</pre>';
    }

    private function diffAnalisa($oldPekerjaan, $newPekerjaan)
    {
        /**
         * insert => jenis_analisa (bahan/upah/material), id_analisa (***.id_analisa_***), id_pekerjaan (pekerjaan.id), koefisien, id_pengaju, komentar
         * update => jenis_analisa (bahan/upah/material), id_analisa (***.id_analisa_***), id_pekerjaan (pekerjaan.id), koefisien, id_pengaju, komentar
         * delete => jenis_analisa (bahan/upah/material), id_analisa (***.id_analisa_***), id_pekerjaan (pekerjaan.id), id_pengaju, komentar
         */

        $diff = ['insert' => [], 'update' => [], 'delete' => []];
    }
}
