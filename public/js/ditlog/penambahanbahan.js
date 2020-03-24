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
            $.ajax({
                url:'/insertrowbahanditlog',
                type:"POST",
                data: "jenis_bahan_bangunan=" + jenis_bahan_bangunan + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&kelompok_bahan=" + kelompok_bahan + "&cabang_itb=" + cabang_itb,
                success: function(data){
                    //alert("Insert Sukses");
                    //$("."+id_analisa_tipe+id_analisa).hide();
                    console.log(data);
                    html='<tr class ="'+data["bahan"].id_bahan+'">'+
                        '<td hidden class="bahan-ID" value="'+data["bahan"].id_bahan+'"></td>'+
                        '<td class="value jenis_bahan_bangunan"><input type="text" value="'+data["bahan"].jenis_bahan_bangunan+'"></td>'+
                        '<td class="value satuan">'+data["bahan"].satuan+'</td>'+
                        '<td class="value harga_satuan"><input type="number" value="'+data["bahan"].harga_satuan+'"></td>'+
                        '<td class="value kelompok_bahan">'+data["bahan"].kelompok_bahan+'</td>'+
                        '<td class="value cabang_itb">'+data["bahan"].cabang_itb+'</td>'+
                        '<td class="changeDBButton">'+
                          '<div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">'+
                            '<button class="updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold" data-toggle="button" aria-pressed="false" id="'+data["bahan"].id_bahan+'">Update</button>'+
                            '<button class="deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold" data-toggle="button" aria-pressed="false" id="'+data["bahan"].id_bahan+'">Delete</button>'+
                          '</div>'+
                        '</td>'+
                        '</tr>';
                    $("table").append(html);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $(".insertButton").on('click', function(){
            $("#jenis_bahan_bangunan").val("");
            $("#harga_satuan").val(0);
        });
        $("table").on('click', '.deleteRow', function(){
            id_bahan = $(this).parent().parent().parent().find("td.bahan-ID:first").attr("value");
            $.ajax({
                url:'/deleterowbahanditlog',
                type:"POST",
                data: "id_bahan=" + id_bahan,
                success: function(data){
                    $("."+id_bahan).remove();
                }, error: function(response){
                    console.log(response);
                }
            });
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