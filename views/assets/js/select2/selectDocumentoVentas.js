function selectDocumentoVentas() {
    $.ajax({
        url: 'json/ajax_documentoventas/documentoVentas.php',
        type: 'post',
        data: { crud: 'getDocumentoVentas' },
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
        $('#frmRegistrarCorrelativo #selectDocumentoventa').html(html);
        $('#frmActualizarCorrelativo #selectDocumentoventa').html(html);

        $('#frmRegistrarCorrelativoLocal #selectDocumentoventa').html(html);
    });
}
selectDocumentoVentas();

$('#frmRegistrarCorrelativoLocal #selectDocumentoventa').change(function () {
    const valorCorrelativoLocal = $('#frmRegistrarCorrelativoLocal #selectDocumentoventa').val();
    if (valorCorrelativoLocal !== "" && valorCorrelativoLocal !== null) {
        $.ajax({
            url: "json/ajax_documentoventas/documentoVentas.php",
            type: 'post',
            data: { crud: "getDocumentxCorrelativo", param: valorCorrelativoLocal },
            dataType: "json",
            error: function (e) {
                swal.fire('Error', 'Error al enviar la solicitud AJAX: ' + e.responseText), 'error';
            }
        }).done(function (e) {
            if (e.responseJson == 'vacio') {
                CorrelativoLocal = `<option value="">[seleccione serie]</option>`;
            } else {
                CorrelativoLocal = `<option value="">[seleccione serie]</option>`;
                for (let index = 0; index < e.length; index++) {
                    CorrelativoLocal += `<option value="${e[index].id}">${e[index].serie}</option>`;
                }
            }
            $("#frmRegistrarCorrelativoLocal #selectSerie").html(CorrelativoLocal);
        });
    }

});
