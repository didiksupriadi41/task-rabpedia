Rencana Anggaran Biaya
<br>
{{ $pengajuan['nama_rab'] }}
<br>
{{ $pengajuan['organization'] }}
<br>
Tahun Anggaran 2019
<br>

<?php $total = 0;?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" font-size="large">No</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col">Spesifikasi</th>
            <th scope="col">Kode</th>
            <th scope="col">No. Gambar</th>
            <th scope="col">Volume</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga Satuan</th>
            <th class="text-right" scope="col">Jumlah Harga</th>
        </tr>
    </thead>
    <?php
$kategotiI = "empty";
$kategotiII = "empty";
?>
    <?php $iter = 1;?>
    @foreach($detail_pengajuan as $dtl_pngj)
        @if($kategotiI != $dtl_pngj->kategori_I)
            <th style="font-size: large;" colspan="9">{{ $dtl_pngj->kategori_I }}</th>
            <?php $kategotiI = $dtl_pngj->kategori_I?>
            @if($kategotiII != $dtl_pngj->kategori_II)
                <!-- <th></th> -->
                <tr>
                    <th style="font-size: small;" colspan="9">{{ $dtl_pngj->kategori_II }}</th>
                </tr>
                <!-- <th></th>   <th></th>   <th></th>   <th></th>   <th></th>   <th></th>   <th></th> -->
                <?php $iter = 1;?>
                <?php $kategotiII = $dtl_pngj->kategori_II?>
            @endif
        @endif

        <tbody>
            <?php $jumlah_analisa_jlh_harga = 0;?>
                <tr>
                    <th scope="row">{{ $iter }}</th>
                    <td>{{ $dtl_pngj->nama_pekerjaan }}</td>
                    <td>{{ $dtl_pngj->spesifikasi }}</td>
                    <td>{{ $dtl_pngj->kode_pekerjaan }}</td>
                    <td>{{ $dtl_pngj->no_gambar }}</td>
                    <td>{{ $dtl_pngj->volume }}</td>
                    <td>{{ $dtl_pngj->satuan }}</td>
                    <td>{{ $dtl_pngj->harga_satuan }}</td>
                    <?php
$jlh_harga = $dtl_pngj->volume * $dtl_pngj->harga_satuan;
$total = $total + $jlh_harga;
?>
                    <td class="text-right">Rp {{ $jlh_harga }}</td>
                </tr>
        </tbody>
        <?php $iter += 1?>
    @endforeach
    <tr>
        <th class="text-right" colspan="8">Jumlah Biaya</th>
        <th class="text-right">Rp {{ $total }}</th>
    </tr>
    <tr>
        <th class="text-right" colspan="8">PPN 10%</th>
        <th class="text-right">Rp {{ $total * 0.1 }}</th>
    </tr>
    <tr>
        <th class="text-right" colspan="8">Total</th>
        <th class="text-right">Rp {{ $total * 1.1 }}</th>
    </tr>
    <tr>
        <th class="text-right" colspan="8">Dibulatkan</th>
        <?php
$ratusan = substr(round($total * 1.1), -2);
$total = round($total * 1.1) + (100 - $ratusan);
?>
        <th class="text-right">Rp {{ $total }}</th>
    </tr>
</table>
