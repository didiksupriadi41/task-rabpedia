( function($) {
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submitInsert").on('click', function(){
            jenis_bahan_bangunan = $("#jenis_bahan_bangunan").val();
            satuan = $("#satuan option:selected").val();
            harga_satuan = $("#harga_satuan").val();
            kelompok_bahan = $("#kelompok_bahan option:selected").val();
            cabang_itb = $("#cabang_itb option:selected").val();
            id_pengaju = $("#id_pengaju").val();
            komentar = $("#komentar").val();
            $.ajax({
                url:'/insertrowbahanuser',
                type:"POST",
                data: "jenis_bahan_bangunan=" + jenis_bahan_bangunan + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&kelompok_bahan=" + kelompok_bahan + "&cabang_itb=" + cabang_itb + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                success: function(data){
                    alert("Insert Sukses");
                    console.log(data);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("table").on('click', '.deleteRow', function(){
            id_bahan = $(this).parent().parent().parent().find("td.bahan-ID:first").attr("value");
            $("#deleteButton").on('click', function(){
                id_pengaju = $("#id_pengaju").val();
                komentar = $('#komentar').val();
                $.ajax({
                    url:'/deleterowbahanuser',
                    type:"POST",
                    data: "id_bahan_delete=" + id_bahan + "&id_pengaju=" + id_pengaju + "&komentar=" + komentar,
                    success: function(data){
                        console.log(data)
                    }, error: function(response){
                        console.log(response);
                    }
                });
            })
        });
        $("table").on('click', '.updateRow', function(){
            id_bahan = $(this).parent().parent().parent().find("td.bahan-ID:first").attr("value");
            jenis_bahan_bangunan = $(this).parent().parent().parent().find("td.jenis_bahan_bangunan input").val();
            harga_satuan = $(this).parent().parent().parent().find("td.harga_satuan input").val();
            console.log(jenis_bahan_bangunan);
            console.log(harga_satuan);
            $.ajax({
                url:'/updaterowbahanditlog',
                type:"POST",
                data: "id_bahan=" + id_bahan + "&jenis_bahan_bangunan=" + jenis_bahan_bangunan + "&harga_satuan=" + harga_satuan,
                success: function(data){
                    console.log(data);
                    $("."+id_bahan).find("td.jenis_bahan_bangunan input").val(data["bahan"].jenis_bahan_bangunan);
                    $("."+id_bahan).find("td.harga_satuan input").val(data["bahan"].harga_satuan);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
    });
} ) ( jQuery );