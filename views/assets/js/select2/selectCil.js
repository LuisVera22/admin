function selectCil() {
    $.ajax({
        url: 'views/src/json/cil.json',
        type: 'post',
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione cil-]</option>`;
            html2 = `<option value="">[-Cil-]</option>`;
        } else {
            html = `<option value="">[-seleccione cil-]</option>`;
            html2 = `<option value="">[-Cil-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
                html2 += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
            }
        }

        $('#frmRegistrarCilEsfAdd #selectCil').html(html);
        $('#frmActualizarCilEsfAdd #selectCil').html(html);

        $('#frmRegistrarItems #selectCilOD,#frmRegistrarItems #selectCilOI,#frmEditarItems #selectCilOD,#frmEditarItems #selectCilOI').html(html2);
    });
}
selectCil();