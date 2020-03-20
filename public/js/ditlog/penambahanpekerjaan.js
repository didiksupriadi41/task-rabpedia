( function($) {
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submitInsertAnalisa").on('click', function(){
            tipe_analisa = $("select#Analisa option:selected").val();
            id_analisa = "";
            if(tipe_analisa == "bahan"){
                id_analisa = $("select#Bahan option:selected").val();
            } else if(tipe_analisa == "upah"){
                id_analisa = $("select#Upah option:selected").val();
            } else if(tipe_analisa == "material"){
                id_analisa = $("select#Material option:selected").val();
            }
            id_pekerjaan = $("input#pekerjaan").val();
            koefisien = $("input#Koefisien").val();
            $.ajax({
                url:'/insertrowanalisaditlog',
                type:"POST",
                data: "tipe_analisa=" + tipe_analisa + "&id_analisa=" + id_analisa + "&id_pekerjaan=" + id_pekerjaan + "&koefisien=" + koefisien,
                success: function(data){
                    html='<tr class="'+data["Tipe"]+data["ID"]+'">'+
                        '<td hidden class="analisis-Tipe" value="'+data["Tipe"]+'"></td>'+
                        '<td hidden class="analisis-ID" value="'+data["ID"]+'"></td>'+
                        '<td class="value">'+data["Bahan-Upah-Material"]+'</td>'+
                        '<td class="value"><input type="number" value="'+data["Koefisien"]+'"></td>'+
                        '<td class="value">'+data["Satuan"]+'</td>'+
                        '<td class="value">'+data["Harga Satuan"]+'</td>'+
                        '<td class="changeDBButton">'+
                        '<div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">'+
                        '<button class="updateRowAnalisa btn btn-secondary btn-success btn-sm text-light font-weight-bold" id="'+data["Tipe"]+data["ID"]+'">Update</button>'+
                        '<button class="deleteRowAnalisa btn btn-secondary btn-danger btn-sm text-light font-weight-bold" id="'+data["Tipe"]+data["ID"]+'">Delete</button>'+
                        '</div>'+
                        '</td>'+
                        '</tr>';
                    $("#addBahanUpahMaterial"+id_pekerjaan).prev().append(html);
                    $("#"+data["ID Pekerjaan"]+"Summary").find("#groupPriceLabelNum").html(data["Harga Satuan Pekerjaan"]);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("#submitInsertPekerjaan").on('click', function(){
            harga_satuan = $("#harga_satuan").val();
            if($("input[name='optionsAnalisa'][value='Dengan Analisa']").prop("checked")){
                harga_satuan = "0";
            }
            id_kategori = $("input#kategori").val();
            jenis_pekerjaan = $("#jenis_pekerjaan").val();
            spesifikasi_teknis = $("#spesifikasi_teknis").val();
            satuan = $("#satuan option:selected").val();
            cabang_itb = $("#cabang_itb option:selected").val();
            $.ajax({
                url:'/insertrowpekerjaanditlog',
                type:"POST",
                data: "id_kategori=" + id_kategori + "&jenis_pekerjaan=" + jenis_pekerjaan + "&spesifikasi_teknis=" + spesifikasi_teknis + "&satuan=" + satuan + "&harga_satuan=" + harga_satuan + "&cabang_itb=" + cabang_itb,
                success: function(data){
                    cabang_string = "";
                    if(data["Cabang"] == "Cirebon"){
                        cabang_string = "(Cirebon)";
                    } else if (data["Cabang"] == "Ganesha"){
                        cabang_string = "(Ganesha)";
                    }
                    html='<div class="accordion my-1 ml-4" id="accordion'+data["ID Pekerjaan"]+data["Cabang"]+'">'+
                        '<div class="card">'+
                        '<div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="'+data["ID Pekerjaan"]+'Summary">'+
                        '<h5 class="text-light font-weight-bold pl-1" id="groupName">'+data["Nama Pekerjaan"]+" "+cabang_string+'</h5>'+
                        '<div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">'+
                        '<h5 class="text-light mx-3" id="groupPriceLabelNum">'+data["Harga Satuan"]+'</h5>'+
                        '<h5 class="text-light mx-3" id="groupPriceLabel">/</h5>'+
                        '<h5 class="text-light mx-3" id="groupPriceNumber">'+data["Satuan"]+'</h5>'+
                        '<button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapse'+data["ID Pekerjaan"]+data["Cabang"]+'" aria-expanded="false" aria-controls="collapse'+data["ID Pekerjaan"]+data["Cabang"]+'" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div id="collapse'+data["ID Pekerjaan"]+data["Cabang"]+'" class="collapse" aria-labelledby="heading'+data["ID Pekerjaan"]+'" data-parent="#accordion'+data["ID Pekerjaan"]+data["Cabang"]+'">'+
                        '<div class="card-body">'+
                        '<input hidden class="pekerjaanid" value="'+data["ID"]+'">'+
                        '<input hidden class="pekerjaanid_pekerjaan" value="'+data["ID Pekerjaan"]+'">'+
                        '<input hidden class="pekerjaancabang_itb" value="'+data["Cabang"]+'">'+
                        '<button class="deleteRowPekerjaan btn btn-secondary btn-danger btn-lg text-light font-weight-bold" id="'+data["ID"]+'">Delete Pekerjaan</button><br><br>'+
                        '<table class="table table-hover p-5">'+           
                        '<tr class="contentHeader">'+
                        '<th class="attribute">Bahan-Upah-Material</th>'+
                        '<th class="attribute">Koefisien</th>'+ 
                        '<th class="attribute">Satuan</th>'+
                        '<th class="attribute">Harga Satuan</th>'+
                        '<th class="attribute"></th>'+
                        '</tr>'+
                        '</table>'+
                        '<button class="w-100 rounded insertButtonAnalisa" value="'+data["ID"]+'" id="addBahanUpahMaterial'+data["ID"]+'" data-toggle="modal" data-target="#ModalInsertAnalisa"><span class="font-weight-bold">+</span></button>'+
                        '</div>'+      
                        '</div>'+
                        '</div>'
                    $("#addBahanUpahMaterial"+id_kategori).prev().append(html);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("div#mainContent").on('click', '.insertButtonAnalisa', function(){
            id_pekerjaan = $(this).val();
            $("input#pekerjaan").val(id_pekerjaan);
            $("input#Koefisien").val(0);
        });
        $(".insertButtonPekerjaan").on('click', function(){
            id_kategori = $(this).val();
            $("input#kategori").val(id_kategori);
            $("#jenis_pekerjaan").val("");
            $("#spesifikasi_teknis").val("");
            if($("input[name='optionsAnalisa'][value='Tanpa Analisa']").prop('checked')){
                $(".harga_satuan").attr('hidden', false);
            }
            $("#harga_satuan").val(0);
        });
        $("#dengan_analisa").on('click', function(){
            $(".harga_satuan").attr('hidden', true);
        });
        $("#tanpa_analisa").on('click', function(){
            $(".harga_satuan").attr('hidden', false);
        });
        $("div#mainContent").on('click', '.updateRowAnalisa', function(){
            id_analisa_tipe = $(this).parent().parent().parent().find("td.analisis-Tipe:first").attr("value");
            id_analisa = $(this).parent().parent().parent().find("td.analisis-ID:first").attr("value");
            koefisien = $(this).parent().parent().parent().find("td input").val();
            $.ajax({
                url:'/updaterowanalisaditlog',
                type:"POST",
                data: "id_analisa_tipe=" + id_analisa_tipe + "&id_analisa=" + id_analisa + "&koefisien=" + koefisien,
                success: function(data){
                    $("#"+data["ID Pekerjaan"]+"Summary").find("#groupPriceLabelNum").html(data["Harga Satuan Pekerjaan"]);
                    $("tr."+id_analisa_tipe+id_analisa+" td input").val(data["Koefisien"]);
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("div#mainContent").on('click', '.deleteRowPekerjaan', function(){
            id = $(this).parent().find("input.pekerjaanid").val();
            id_pekerjaan = $(this).parent().find("input.pekerjaanid_pekerjaan").val();
            cabang_itb = $(this).parent().find("input.pekerjaancabang_itb").val();
            $.ajax({
                url:'/deleterowpekerjaanditlog', 
                type:"POST", 
                data: "id=" + id, 
                success: function(data){
                    $("div#accordion"+id_pekerjaan+cabang_itb).remove();
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("div#mainContent").on('click', '.deleteRowAnalisa', function(){
            id_analisa_tipe = $(this).parent().parent().parent().find("td.analisis-Tipe:first").attr("value");
            id_analisa = $(this).parent().parent().parent().find("td.analisis-ID:first").attr("value");
            $.ajax({
                url:'/deleterowanalisaditlog',
                type:"POST",
                data: "id_analisa_tipe=" + id_analisa_tipe + "&id_analisa=" + id_analisa,
                success: function(data){
                    $("#"+data["ID Pekerjaan"]+"Summary").find("#groupPriceLabelNum").html(data["Harga Satuan Pekerjaan"]);
                    $("tr."+id_analisa_tipe+id_analisa).remove();
                }, error: function(response){
                    console.log(response);
                }
            });
        });
        $("select#Analisa").change(function(){
            jenis = $("#Analisa option:selected").val();
            if(jenis == "bahan"){
                $("h6#JenisAnalisa").html("Bahan");
                $("select#Bahan").attr('hidden', false);
                $("select#Upah").attr('hidden', true);
                $("select#Material").attr('hidden', true);
                $("#submitInsert").attr('hidden', false);
            } else if(jenis == "upah"){
                $("h6#JenisAnalisa").html("Upah");
                $("select#Bahan").attr('hidden', true);
                $("select#Upah").attr('hidden', false);
                $("select#Material").attr('hidden', true);
                $("#submitInsert").attr('hidden', false);
            } else if (jenis == "material"){
                $("h6#JenisAnalisa").html("Material");
                $("select#Bahan").attr('hidden', true);
                $("select#Upah").attr('hidden', true);
                $("select#Material").attr('hidden', false);
                $("#submitInsert").attr('hidden', false);                
            }
        });
    });
} ) ( jQuery );