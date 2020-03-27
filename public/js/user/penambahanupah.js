$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#submitInsert").on('click', function(){
        jenis_pekerja = $("#jenis_pekerja").val();
        satuan = $("#satuan option:selected").val();
        harga_satuan = $("#harga_satuan").val();
        cabang_itb = $("#cabang_itb option:selected").val();
        id_pengaju = $("#id_pengaju").val();
        komentar = $("#komentar").val();
        $.ajax({
            url:'/insertrowupahuser',
            type:"POST",
            data: "jenis_pekerja=" + jenis_pekerja + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&cabang_itb=" + cabang_itb + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
            success: function(data){
                alert("Insert Sukses");
                //$("."+id_analisa_tipe+id_analisa).hide();
                console.log(data);
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.deleteRow', function(){
        id_bahan = $(this).parent().parent().parent().find("td.upah-ID:first").attr("value");
        $("#deleteButton").on('click', function(){
            id_pengaju = $("#id_pengaju").val();
            komentar = $('#komentar').val();
            $.ajax({
                url:'/deleterowupahuser',
                type:"POST",
                data: "id_upah_delete=" + id_bahan + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                success: function(data){
                    console.log(data)
                }, error: function(response){
                    console.log(response);
                }
            });
        })
    });
    $("table").on('click', '.editRow', function(){
        id_upah = $(this).parent().parent().parent().find("td.upah-ID:first").attr("value");
        jenis_pekerja = $(this).parent().parent().parent().find("td.jenis_pekerja input").val();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan input").val();
        $("#editButton").on('click', function(){  
            id_pengaju = $("#id_pengaju").val();
            komentar = $('#komentar').val();  
            $.ajax({
                url:'/updaterowupahuser',
                type:"POST",
                data: "id_upah_update=" + id_upah + "&jenis_pekerja=" + jenis_pekerja + "&harga_satuan=" + harga_satuan + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                success: function(data){
                    console.log(data);
                }, error: function(response){
                    console.log(response);
                }
            });
        })
    });
});