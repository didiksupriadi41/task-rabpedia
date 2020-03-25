( function($) {
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
            id_upah = $(this).parent().parent().parent().find("td.upah-ID:first").attr("value");
            $.ajax({
                url:'/deleterowupahditlog',
                type:"POST",
                data: "id_upah=" + id_upah,
                success: function(data){
                    $("."+id_upah).remove();
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("table").on('click', '.updateRow', function(){
            id_upah = $(this).parent().parent().parent().find("td.upah-ID:first").attr("value");
            jenis_pekerja = $(this).parent().parent().parent().find("td.jenis_pekerja input").val();
            harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan input").val();
            console.log(jenis_pekerja);
            console.log(harga_satuan);
            $.ajax({
                url:'/updaterowupahditlog',
                type:"POST",
                data: "id_upah=" + id_upah + "&jenis_pekerja=" + jenis_pekerja + "&harga_satuan=" + harga_satuan,
                success: function(data){
                    console.log(data);
                    $("."+id_upah).find("td.jenis_pekerja input").val(data["upah"].jenis_pekerja);
                    $("."+id_upah).find("td.harga_satuan input").val(data["upah"].harga_satuan);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
    });
} ) ( jQuery );