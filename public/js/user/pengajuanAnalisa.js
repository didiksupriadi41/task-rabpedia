$(document).ready(function() {
    $(".delete-row").on("click", function() {
        const id = $(this).attr("id");
        $(`tr#row-${id}`).remove();
    });

    $("#submitInsertAnalisa").on("click", function() {
        const tipe_analisa = $("select#Analisa option:selected").val();
        let id_analisa = "";
        let konten = "";
        if (tipe_analisa == "bahan") {
            id_analisa = $("select#Bahan option:selected").val();
            konten = $("select#Bahan option:selected").html();
        } else if (tipe_analisa == "upah") {
            id_analisa = $("select#Upah option:selected").val();
            konten = $("select#Upah option:selected").html();
        } else if (tipe_analisa == "material") {
            id_analisa = $("select#Material option:selected").val();
            konten = $("select#Material option:selected").html();
        }
        const koefisien = $("input#Koefisien").val();

        konten = konten.split(",");
        const namaAnalisa = konten[0].trim();
        const satuan = konten[1].trim();
        const hargaSatuan = (+konten[2].trim()).toLocaleString("us", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        html = `<tr id='row-${tipe_analisa}${id_analisa}'>
                    <td hidden><input hidden name='data[${tipe_analisa}${id_analisa}][jenis_analisa]' value="${tipe_analisa}" /></td>
                    <td hidden><input hidden name='data[${tipe_analisa}${id_analisa}][id_analisa]' value="-1" /></td>
                    <td hidden><input hidden name='data[${tipe_analisa}${id_analisa}][id_item]' value="${id_analisa}" /></td>

                    <td class='value'>${namaAnalisa}</td>
                    <td class='value'>
                        <input class='form-control form-control-sm' type='number' name='data[${tipe_analisa}${id_analisa}][koefisien]'
                            value='${koefisien}'>
                    </td>
                    <td class='value'>${satuan}</td>
                    <td class='value'>${hargaSatuan}</td>
                    <td class='changeDBButton'>
                        <button type="button"
                            class='delete-row btn btn-secondary btn-danger btn-sm text-light font-weight-bold'
                            id='${tipe_analisa}${id_analisa}'>Delete
                        </button>
                    </td>
                </tr>`;

        $("#table-analisa").append(html);
    });

    $("select#Analisa").change(function() {
        const jenis = $("#Analisa option:selected").val();
        if (jenis == "bahan") {
            $("h6#JenisAnalisa").html("Bahan");
            $("select#Bahan").attr("hidden", false);
            $("select#Upah").attr("hidden", true);
            $("select#Material").attr("hidden", true);
            $("#submitInsert").attr("hidden", false);
        } else if (jenis == "upah") {
            $("h6#JenisAnalisa").html("Upah");
            $("select#Bahan").attr("hidden", true);
            $("select#Upah").attr("hidden", false);
            $("select#Material").attr("hidden", true);
            $("#submitInsert").attr("hidden", false);
        } else if (jenis == "material") {
            $("h6#JenisAnalisa").html("Material");
            $("select#Bahan").attr("hidden", true);
            $("select#Upah").attr("hidden", true);
            $("select#Material").attr("hidden", false);
            $("#submitInsert").attr("hidden", false);
        }
    });
});
