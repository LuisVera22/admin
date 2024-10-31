function selectTipoManufactura() {
    $.ajax({
        url: 'json/ajax_tipomanufactura/tipoManufactura.php',
        type: 'post',
        data: { crud: 'getTipoManufacturas' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione tipo de manufacturación-]</option>`;
        } else {
            html = `<option value="">[-seleccione tipo de manufacturación-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}" data-abrev="${e[i].abbreviation}">${e[i].description}</option>`;
            }
        }
        $('#frmRegistrarTipos #selecttypemanufacturing,#frmRegistrarProductos #selectTipoManu,#frmRegistrarProductosAlmacen #selectTipoManu,#frmRegistrarReposicionAlmacen #selectTipoManu').html(html);
        $('#frmActualizarTipos #selecttypemanufacturingod,#frmActualizarPructos #selectTipoManu, #frmActualizarProductos #selectTipoManu').html(html);
        //$('#frmRegistrarProductos #selectTipoManu').html(html);        
        $('#encabezado_orden #selectTipoManufactura').html(html);
        $('#encabezado_actaulizar_orden #selectTipoManufactura').html(html);
    });
}
selectTipoManufactura();