( function($) {
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submitInsert").on('click', function(){
            item_material = $("#item_material").val();
            volume = $("#volume").val();
            satuan = $("#satuan option:selected").val();
            harga_pembanding = $("#harga_pembanding").val();
            harga_saat_ini = $("#harga_saat_ini").val();
            harga_satuan = $("#harga_satuan").val();
            keterangan_tambahan = $("#keterangan_tambahan").val();
            cabang_itb = $("#cabang_itb option:selected").val();
            id_pengaju = $("#id_pengaju").val();
            komentar = $("#komentar").val();
            $.ajax({
                url:'/insertrowmaterialuser',
                type:"POST",
                data: "item_material=" + item_material + "&volume=" + volume + "&satuan=" + satuan + "&harga_pembanding=" + harga_pembanding + "&harga_saat_ini=" + harga_saat_ini + "&harga_satuan=" + harga_satuan + "&keterangan_tambahan=" + keterangan_tambahan + "&cabang_itb=" + cabang_itb + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
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
            id_bahan = $(this).parent().parent().parent().find("td.material-ID:first").attr("value");
            $("#deleteButton").on('click', function(){
                id_pengaju = $("#id_pengaju").val();
                komentar = $('#komentar').val();
                $.ajax({
                    url:'/deleterowmaterialuser',
                    type:"POST",
                    data: "id_material_delete=" + id_bahan + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                    success: function(data){
                        console.log(data)
                    }, error: function(response){
                        console.log(response);
                    }
                });
            })
        });
        $("table").on('click', '.editRow', function(){
            id_material = $(this).parent().parent().parent().find("td.material-ID:first").attr("value");
            item_material = $(this).parent().parent().parent().find("td.item_material input").val();
            volume = $(this).parent().parent().parent().find("td.volume input").val();
            harga_pembanding = $(this).parent().parent().parent().find("td.harga_pembanding input").val();
            harga_saat_ini = $(this).parent().parent().parent().find("td.harga_saat_ini input").val();
            harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan input").val();
            $("#editButton").on('click', function(){  
                id_pengaju = $("#id_pengaju").val();
                komentar = $('#komentar').val();  
                $.ajax({
                    url:'/updaterowmaterialuser',
                    type:"POST",
                    data: "id_material_update=" + id_material + "&item_material=" + item_material + "&volume=" + volume + "&harga_pembanding=" + harga_pembanding + "&harga_saat_ini=" + harga_saat_ini + "&harga_satuan=" + harga_satuan + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                    success: function(data){
                        console.log(data);
                    }, error: function(response){
                        console.log(response);
                    }
                });
            })
        });
    });
} ) ( jQuery );