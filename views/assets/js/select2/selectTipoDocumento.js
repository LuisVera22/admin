function selectTipoDocumentos() {
    $.ajax({
        url: 'json/ajax_tipodocumento/tipoDocumento.php',
        type: 'post',
        data: { crud: 'getTipoDocumentos' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione documento venta-]</option>`;
        } else {
            html = `<option value="">[-seleccione documento venta-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].description}</option>`;
            }
        }
        $('#frmRegistrarPersonal #selectTipoDocumento').html(html);
        $('#frmActualizarPersonal #selectTipoDocumento').html(html);
        $('#frmRegistrarCliente #selectTipoDocumento').html(html);
        $('#frmActualizarCliente #selectTipoDocumento').html(html);
        $('#selectTipoDocumento').html(html);
    });
}
selectTipoDocumentos();