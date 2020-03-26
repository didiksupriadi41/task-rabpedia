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
        $("table").on('click', '.updateRow', function(){
            id_material = $(this).parent().parent().parent().find("td.material-ID:first").attr("value");
            item_material = $(this).parent().parent().parent().find("td.item_material input").val();
            volume = $(this).parent().parent().parent().find("td.volume input").val();
            harga_pembanding = $(this).parent().parent().parent().find("td.harga_pembanding input").val();
            harga_saat_ini = $(this).parent().parent().parent().find("td.harga_saat_ini input").val();
            harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan input").val();
            keterangan_tambahan = $(this).parent().parent().parent().find("td.keterangan_tambahan input").val();
            console.log(item_material);
            console.log(volume);
            console.log(harga_pembanding);
            console.log(harga_saat_ini);
            console.log(harga_satuan);
            console.log(keterangan_tambahan);
            $.ajax({
                url:'/updaterowmaterialditlog',
                type:"POST",
                data: "id_material=" + id_material + "&item_material=" + item_material + "&volume=" + volume + "&harga_pembanding=" + harga_pembanding + "&harga_saat_ini=" + harga_saat_ini + "&harga_satuan=" + harga_satuan + "&keterangan_tambahan=" + keterangan_tambahan,
                success: function(data){
                    console.log(data);
                    $("."+id_material).find("td.item_material input").val(data["material"].item_material);
                    $("."+id_material).find("td.volume input").val(data["material"].volume);
                    $("."+id_material).find("td.harga_pembanding input").val(data["material"].harga_pembanding);
                    $("."+id_material).find("td.harga_saat_ini input").val(data["material"].harga_saat_ini);
                    $("."+id_material).find("td.harga_satuan input").val(data["material"].harga_satuan);
                    $("."+id_material).find("td.keterangan_tambahan input").val(data["material"].keterangan_tambahan);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
    });
} ) ( jQuery );