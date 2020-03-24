( function($) {
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submitInsert").on('click', function(){
            tipe_analisa = $("#Analisa option:selected").val();
            id_analisa = "";
            if(jenis == "bahan"){
                id_analisa = $("#Bahan option:selected").val();
            } else if(jenis == "upah"){
                id_analisa = $("#Upah option:selected").val();
            } else if(jenis == "material"){
                id_analisa = $("#Material option:selected").val();
            }
            id_pekerjaan = $("#pekerjaan").val();
            koefisien = $("#koefisien").val();
            $.ajax({
                url:'/insertrowanalisa',
                type:"POST",
                data: "tipe_analisa=" + tipe_analisa + "&id_analisa=" + id_analisa + "&id_pekerjaan=" + id_pekerjaan + "&koefisien=" + koefisien,
                success: function(data){
                    //alert("Insert Sukses");
                    //$("."+id_analisa_tipe+id_analisa).hide();
                    console.log(data);
                    html='<tr class="'+data["Tipe"]+data["ID"]+'">'+
                        '<td hidden class="analisis-Tipe" value="'+data["Tipe"]+'"></td>'+
                        '<td hidden class="analisis-ID" value="'+data["ID"]+'"></td>'+
                        '<td class="value">'+data["Bahan-Upah-Material"]+'</td>'+
                        '<td class="value">'+data["Koefisien"]+'</td>'+
                        '<td class="value">'+data["Satuan"]+'</td>'+
                        '<td class="value">'+data["Harga Satuan"]+'</td>'+
                        '<td><button class="deleteRow" id="'+data["Tipe"]+data["ID"]+'">X</td>'+
                        '</tr>';
                    $("#addBahanUpahMaterial"+id_pekerjaan).prev().append(html);
                    $("#"+data["ID Pekerjaan"]+"Summary").find("#groupPriceLabelNum").html(data["Harga Satuan Pekerjaan"]);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $(".insertButton").on('click', function(){
            id_pekerjaan = $(this).val();
            $("#pekerjaan").val(id_pekerjaan);
            $("#Bahan").attr('hidden', true);
            $("#Upah").attr('hidden', true);
            $("#Material").attr('hidden', true);
            $("#koefisien").val(0);
            $("#ModalInsert :selected").removeAttr('selected');
            $("#submitInsert").attr('hidden', true);
        });
        $("table").on('click', '.deleteRow', function(){
            id_analisa_tipe = $(this).parent().parent().find("td.analisis-Tipe:first").attr("value");
            id_analisa = $(this).parent().parent().find("td.analisis-ID:first").attr("value");
            $.ajax({
                url:'/deleterowanalisa',
                type:"POST",
                data: "id_analisa_tipe=" + id_analisa_tipe + "&id_analisa=" + id_analisa,
                success: function(data){
                    //alert("Delete Sukses");
                    $("#"+data["ID Pekerjaan"]+"Summary").find("#groupPriceLabelNum").html(data["Harga Satuan Pekerjaan"]);
                    $("."+id_analisa_tipe+id_analisa).remove();
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("#Analisa").change(function(){
            jenis = $("#Analisa option:selected").val();
            if(jenis == "bahan"){
                $("#Bahan").attr('hidden', false);
                $("#Upah").attr('hidden', true);
                $("#Material").attr('hidden', true);
                $("#submitInsert").attr('hidden', false);
            } else if(jenis == "upah"){
                $("#Bahan").attr('hidden', true);
                $("#Upah").attr('hidden', false);
                $("#Material").attr('hidden', true);
                $("#submitInsert").attr('hidden', false);
            } else if (jenis == "material"){
                $("#Bahan").attr('hidden', true);
                $("#Upah").attr('hidden', true);
                $("#Material").attr('hidden', false);
                $("#submitInsert").attr('hidden', false);                
            } else{
                $("#Bahan").attr('hidden', true);
                $("#Upah").attr('hidden', true);
                $("#Material").attr('hidden', true);
                $("#submitInsert").attr('hidden', true);
            }
        });
    });
} ) ( jQuery );