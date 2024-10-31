function selectEsf() {
    $.ajax({
        url: 'views/src/json/esf.json',
        type: 'post',
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione esf-]</option>`;
            html2 = `<option value="">[-Esf-]</option>`;
        } else {
            html = `<option value="">[-seleccione esf-]</option>`;
            html2 = `<option value="">[-Esf-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
                html2 += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
            }
        }

        $('#frmRegistrarCilEsfAdd #selectEsf').html(html);
        $('#frmActualizarCilEsfAdd #selectEsf').html(html);

        $('#frmRegistrarItems #selectEsfOD').html(html2);
        $('#frmRegistrarItems #selectEsfOI').html(html2);

        $('#frmEditarItems #selectEsfOD').html(html2);
        $('#frmEditarItems #selectEsfOI').html(html2);
    });
}
selectEsf();