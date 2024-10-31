function selectLocales() {
    $.ajax({
        url: 'json/ajax_local/local.php',
        type: 'post',
        data: { crud: 'getLocales' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione sede/lugar-]</option>`;
        } else {
            html = `<option value="">[-seleccione sede/lugar-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].headquarters.description} || ${e[i].address}</option>`;
            }
        }

        $('#frmRegistrarPersonal #selectSede').html(html);
        $('#frmActualizarPersonal #selectSede').html(html);

        $('#frmRegistrarServicios #selectSede').html(html);
        $('#frmActualizarServicios #selectSede').html(html);

        $('#frmRegistrarProductos #selectSedes').html(html);
        $('#frmActualizarProductos #selectSedes').html(html);

        $('#frmRegistrarProductosAlmacen #selectSedes').html(html);
        $('#frmRegistrarReposicionAlmacen #selectSedes').html(html);

        $('#frmRegistrarSalidaStock #selectLocal').html(html);

        $('#encabezado_orden #selectSede').html(html);
        $('#encabezado_actaulizar_orden #selectSede').html(html);

        //para la vista nueva-orden-trabajo
        const vendor = JSON.parse(localStorage.getItem('empleado'));
        if(vendor){
            $('#encabezado_orden #selectSede').val(vendor.idstore).trigger('change');
            $('#encabezado_actaulizar_orden #selectSede').val(vendor.idstore).trigger('change');
        }
    });
}
selectLocales();
