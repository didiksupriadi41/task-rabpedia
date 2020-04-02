<?php

namespace App\Http\Controllers;

use App\AnalisaBahan;
use App\AnalisaMaterial;
use App\AnalisaUpah;
use App\Bahan;
use App\Material;
use App\Pekerjaan;
use App\PengajuanAnalisaDelete;
use App\PengajuanAnalisaInsert;
use App\PengajuanAnalisaUpdate;
use App\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $analisis_template = ["ID Analisis", "ID Item", "Tipe", "Bahan-Upah-Material", "Koefisien", "Satuan", "Harga Satuan"];

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
                $analisa_bahan->bahan->id_bahan,
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
                $analisa_upah->upah->id_upah,
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
                $analisa_material->material->id_material,
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
        $diff_template = ['jenis_analisa', 'id_analisa', 'id_item', 'koefisien'];

        $list_analisa_initial = [];
        $list_analisa_bahan_initial = AnalisaBahan::where('id', $id)->get();
        $list_analisa_upah_initial = AnalisaUpah::where('id', $id)->get();
        $list_analisa_material_initial = AnalisaMaterial::where('id', $id)->get();

        foreach ($list_analisa_bahan_initial as $analisa_bahan) {
            array_push($list_analisa_initial, mapping($diff_template, [
                'bahan',
                $analisa_bahan->id_analisa_bahan,
                $analisa_bahan->bahan->id_bahan,
                number_format($analisa_bahan->koefisien, 4)
            ]));
        }
        foreach ($list_analisa_upah_initial as $analisa_upah) {
            array_push($list_analisa_initial, mapping($diff_template, [
                'upah',
                $analisa_upah->id_analisa_upah,
                $analisa_upah->upah->id_upah,
                number_format($analisa_upah->koefisien, 4)
            ]));
        }
        foreach ($list_analisa_material_initial as $analisa_material) {
            array_push($list_analisa_initial, mapping($diff_template, [
                'material',
                $analisa_material->id_analisa_material,
                $analisa_material->material->id_material,
                number_format($analisa_material->koefisien, 4)
            ]));
        }

        $list_analisa_new = $request->data;
        $diff = $this->diffAnalisa($list_analisa_initial, $list_analisa_new);

        foreach ($diff['insert'] as $diff_insert) {
            $pengajuanAnalisaInsert = new PengajuanAnalisaInsert;
            $pengajuanAnalisaInsert->jenis_analisa = $diff_insert['jenis_analisa'];
            $pengajuanAnalisaInsert->id_analisa = $diff_insert['id_item'];
            $pengajuanAnalisaInsert->id_pekerjaan = $id;
            $pengajuanAnalisaInsert->koefisien = $diff_insert['koefisien'];
            $pengajuanAnalisaInsert->id_pengaju = Auth::user()->id;
            $pengajuanAnalisaInsert->komentar = ''; # TODO
            $pengajuanAnalisaInsert->save();
        }

        foreach ($diff['update'] as $diff_update) {
            $pengajuanAnalisaUpdate = new PengajuanAnalisaUpdate;
            $pengajuanAnalisaUpdate->jenis_analisa = $diff_update['jenis_analisa'];
            $pengajuanAnalisaUpdate->id_analisa = $diff_update['id_analisa'];
            $pengajuanAnalisaUpdate->id_pekerjaan = $id;
            $pengajuanAnalisaUpdate->koefisien = $diff_update['koefisien'];
            $pengajuanAnalisaUpdate->id_pengaju = Auth::user()->id;
            $pengajuanAnalisaUpdate->komentar = ''; # TODO
            $pengajuanAnalisaUpdate->save();
        }

        foreach ($diff['delete'] as $diff_delete) {
            $pengajuanAnalisaDelete = new PengajuanAnalisaDelete;
            $pengajuanAnalisaDelete->jenis_analisa = $diff_delete['jenis_analisa'];
            $pengajuanAnalisaDelete->id_analisa = $diff_delete['id_analisa'];
            $pengajuanAnalisaDelete->id_pekerjaan = $id;
            $pengajuanAnalisaDelete->id_pengaju = Auth::user()->id;
            $pengajuanAnalisaDelete->komentar = ''; # TODO
            $pengajuanAnalisaDelete->save();
        }

        return redirect('/home');
    }

    private function diffAnalisa($old_analisa, $new_analisa)
    {
        /**
         * Bandingkan ID_ITEM bukan ID_ANALISA di insert
         * 
         * insert => jenis_analisa (bahan/upah/material), id_analisa bertindak sebagai id_item(***.id_***), id_pekerjaan (pekerjaan.id), koefisien, id_pengaju, komentar
         * update => jenis_analisa (bahan/upah/material), id_analisa (analisa_***.id_analisa_***), id_pekerjaan (pekerjaan.id), koefisien, id_pengaju, komentar
         * delete => jenis_analisa (bahan/upah/material), id_analisa (analisa_***.id_analisa_***), id_pekerjaan (pekerjaan.id), id_pengaju, komentar
         */

        $diff = ['insert' => [], 'update' => [], 'delete' => []];

        // echo '<pre>' . var_export($old_analisa, true) . '</pre>';
        // echo '<pre>' . var_export($new_analisa, true) . '</pre>';

        foreach ($old_analisa as $o) {
            $deleted = true;
            foreach ($new_analisa as $n) {
                if (
                    $o['jenis_analisa'] === $n['jenis_analisa'] &&
                    ($o['id_analisa'] === intval($n['id_analisa']) || $o['id_item'] === intval($n['id_item']))
                ) {

                    $deleted = false;
                    $koef_old = floatval($o['koefisien']);
                    $koef_new = floatval($n['koefisien']);

                    if ($koef_new != $koef_old) array_push($diff['update'], $n);
                }
            }

            if ($deleted) array_push($diff['delete'], $o);
        }

        foreach ($new_analisa as $n) {
            $insert = true;
            foreach ($old_analisa as $o) {
                if ($o['jenis_analisa'] === $n['jenis_analisa'] && $o['id_item'] === intval($n['id_item'])) {
                    $insert = false;
                }
            }

            if ($insert) array_push($diff['insert'], $n);
        }

        // echo '<pre>' . var_export($diff, true) . '</pre>';
        return $diff;
    }
}
