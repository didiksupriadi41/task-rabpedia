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
            $.ajax({
                url:'/insertrowupahditlog',
                type:"POST",
                data: "jenis_pekerja=" + jenis_pekerja + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&cabang_itb=" + cabang_itb,
                success: function(data){
                    //alert("Insert Sukses");
                    //$("."+id_analisa_tipe+id_analisa).hide();
                    console.log(data);
                    html='<tr class ="'+data["upah"].id_upah+'">'+
                        '<td hidden class="upah-ID" value="'+data["upah"].id_upah+'"></td>'+
                        '<td class="value jenis_pekerja"><input type="text" value="'+data["upah"].jenis_pekerja+'"></td>'+
                        '<td class="value satuan">'+data["upah"].satuan+'</td>'+
                        '<td class="value harga_satuan"><input type="number" value="'+data["upah"].harga_satuan+'"></td>'+
                        '<td class="value cabang_itb">'+data["upah"].cabang_itb+'</td>'+
                        '<td class="changeDBButton">'+
                          '<div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">'+
                            '<button class="updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold" data-toggle="button" aria-pressed="false" id="'+data["upah"].id_upah+'">Update</button>'+
                            '<button class="deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold" data-toggle="button" aria-pressed="false" id="'+data["upah"].id_upah+'">Delete</button>'+
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
            $("#jenis_pekerja").val("");
            $("#harga_satuan").val(0);
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