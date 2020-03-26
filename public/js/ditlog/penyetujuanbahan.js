$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("table").on('click', '.agreeInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.bahan-ID").attr("value");
        jenis_bahan_bangunan = $(this).parent().parent().parent().find("td.jenis_bahan_bangunan").text();
        satuan = $(this).parent().parent().parent().find("td.satuan").text();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan").text();
        kelompok_bahan = $(this).parent().parent().parent().find("td.kelompok_bahan").text();
        cabang_itb = $(this).parent().parent().parent().find("td.cabang_itb").text();
        $.ajax({
            url:'/insertfrombahaninsertditlog',
            type:"POST",
            data: "id=" + id + "&jenis_bahan_bangunan=" + jenis_bahan_bangunan + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&kelompok_bahan=" + kelompok_bahan + "&cabang_itb=" + cabang_itb,
            success: function(data){
                $(".insert"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.declineInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.bahan-ID").attr("value");
        $.ajax({
            url:'/deletefrombahaninsertditlog',
            type:"POST",
            data: "id=" + id,
            success: function(data){
                $("."+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
});