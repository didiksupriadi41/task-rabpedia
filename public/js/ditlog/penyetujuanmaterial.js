$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("table").on('click', '.agreeInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.material-insert-ID").attr("value");
        item_material = $(this).parent().parent().parent().find("td.item_material").text();
        volume = $(this).parent().parent().parent().find("td.volume").text();
        satuan = $(this).parent().parent().parent().find("td.satuan").text();
        harga_pembanding = $(this).parent().parent().parent().find("td.harga_pembanding").text();
        harga_saat_ini = $(this).parent().parent().parent().find("td.harga_saat_ini").text();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan").text();
        keterangan_tambahan = $(this).parent().parent().parent().find("td.keterangan_tambahan").text();
        cabang_itb = $(this).parent().parent().parent().find("td.cabang_itb").text();
        $.ajax({
            url:'/insertfrommaterialinsertditlog',
            type:"POST",
            data: "id=" + id + "&item_material=" + item_material + "&volume=" + volume + "&satuan=" + satuan + "&harga_pembanding=" + harga_pembanding + "&harga_saat_ini=" + harga_saat_ini + "&harga_satuan=" + harga_satuan + "&keterangan_tambahan=" + keterangan_tambahan + "&cabang_itb=" + cabang_itb,
            success: function(data){
                $(".insert"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.agreeUpdateRow', function(){
        id = $(this).parent().parent().parent().find("td.material-ID").attr("value");
        id_material = $(this).parent().parent().parent().find("td.material-update-ID").attr("value");
        item_material = $(this).parent().parent().parent().find("td.item_material").text();
        volume = $(this).parent().parent().parent().find("td.volume").text();
        harga_pembanding = $(this).parent().parent().parent().find("td.harga_pembanding").text();
        harga_saat_ini = $(this).parent().parent().parent().find("td.harga_saat_ini").text();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan").text();
        $.ajax({
            url:'/insertfrommaterialupdateditlog',
            type:"POST",
            data: "id=" + id + "&id_material=" + id_material + "&item_material=" + item_material + "&volume=" + volume + "&harga_pembanding=" + harga_pembanding + "&harga_saat_ini=" + harga_saat_ini + "&harga_satuan=" + harga_satuan,
            success: function(data){
                $(".update"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.agreeDeleteRow', function(){
        id = $(this).parent().parent().parent().find("td.bahan-ID").attr("value");
        id_bahan = $(this).parent().parent().parent().find("td.bahan-delete-ID").attr("value");
        console.log(id_bahan);
        $.ajax({
            url:'/insertfrombahandeleteditlog',
            type:"POST",
            data: "id=" + id + "&id_bahan=" + id_bahan,
            success: function(data){
                $(".delete"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.declineInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.material-insert-ID").attr("value");
        $.ajax({
            url:'/deletefrommaterialinsertditlog',
            type:"POST",
            data: "id=" + id,
            success: function(data){
                $(".insert"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.declineUpdateRow', function(){
        id = $(this).parent().parent().parent().find("td.material-ID").attr("value");
        $.ajax({
            url:'/deletefrommaterialupdateditlog',
            type:"POST",
            data: "id=" + id,
            success: function(data){
                $(".update"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.declineDeleteRow', function(){
        id = $(this).parent().parent().parent().find("td.bahan-ID").attr("value");
        $.ajax({
            url:'/deletefrombahandeleteditlog',
            type:"POST",
            data: "id=" + id,
            success: function(data){
                $(".delete"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
});