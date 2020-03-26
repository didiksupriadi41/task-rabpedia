$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("table").on('click', '.agreeInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.upah-insert-ID").attr("value");
        jenis_pekerja = $(this).parent().parent().parent().find("td.jenis_pekerja").text();
        satuan = $(this).parent().parent().parent().find("td.satuan").text();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan").text();
        cabang_itb = $(this).parent().parent().parent().find("td.cabang_itb").text();
        $.ajax({
            url:'/insertfromupahinsertditlog',
            type:"POST",
            data: "id=" + id + "&jenis_pekerja=" + jenis_pekerja + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&cabang_itb=" + cabang_itb,
            success: function(data){
                $(".insert"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.agreeUpdateRow', function(){
        id = $(this).parent().parent().parent().find("td.upah-ID").attr("value");
        id_upah = $(this).parent().parent().parent().find("td.upah-update-ID").attr("value");
        jenis_pekerja = $(this).parent().parent().parent().find("td.jenis_pekerja").text();
        harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan").text();
        $.ajax({
            url:'/insertfromupahupdateditlog',
            type:"POST",
            data: "id=" + id + "&id_upah=" + id_upah + "&jenis_pekerja=" + jenis_pekerja + "&harga_satuan=" + harga_satuan,
            success: function(data){
                $(".update"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.agreeDeleteRow', function(){
        id = $(this).parent().parent().parent().find("td.upah-ID").attr("value");
        id_upah = $(this).parent().parent().parent().find("td.upah-delete-ID").attr("value");
        $.ajax({
            url:'/insertfromupahdeleteditlog',
            type:"POST",
            data: "id=" + id + "&id_upah=" + id_upah,
            success: function(data){
                $(".delete"+id).remove();
            }, error: function(response){
                console.log(response);
            }
        });
    });
    $("table").on('click', '.declineInsertRow', function(){
        id = $(this).parent().parent().parent().find("td.upah-insert-ID").attr("value");
        $.ajax({
            url:'/deletefromupahinsertditlog',
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
        id = $(this).parent().parent().parent().find("td.upah-ID").attr("value");
        console.log(id);
        $.ajax({
            url:'/deletefromupahupdateditlog',
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
        id = $(this).parent().parent().parent().find("td.upah-ID").attr("value");
        $.ajax({
            url:'/deletefromupahdeleteditlog',
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