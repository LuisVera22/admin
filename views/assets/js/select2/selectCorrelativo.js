$('#frmRegistrarCorrelativoLocal #selectSerie').change(function () {
    const valorCorrelativo = $('#frmRegistrarCorrelativoLocal #selectSerie').val();

    if (valorCorrelativo !== "" && valorCorrelativo !== null) {
        $.ajax({
            url: "json/ajax_correlativo/correlativo.php",
            type: 'post',
            data: { crud: "getCorrelativo", param: valorCorrelativo },
            dataType: "json",
            error: function (e) {
                swal.fire('Error', 'Error al enviar la solicitud AJAX: ' + e.responseText), 'error';
            }
        }).done(function (e) {
            $("#frmRegistrarCorrelativoLocal #textInicioNum").val(e.correlative);
        });
    }
});