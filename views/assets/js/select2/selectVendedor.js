function selectVendedor() {
    $.ajax({
        url: 'json/ajax_personal/personal.php',
        type: 'post',
        data: { crud: 'listRolVendedor',rol:'vendedor' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione vendedor-]</option>`;
            htmlFilter = `<option value="">[-seleccione vendedor-]</option>`;
        } else {
            html = `<option value="">[-seleccione vendedor-]</option>`;
            htmlFilter = `<option value="">[-seleccione vendedor-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].lastname}, ${e[i].name}</option>`;
                htmlFilter += `<option value="${e[i].lastname}, ${e[i].name}">${e[i].lastname}, ${e[i].name}</option>`;
            }
        }

        $('#selectRecepcionado').html(html);
        $('#frmFilterOrdenes #filterVendedor').html(htmlFilter);

        //para la vista nueva-orden-trabajo
        const vendor = JSON.parse(localStorage.getItem('empleado'));
        if(vendor){
            $('#encabezado_orden #selectRecepcionado').val(vendor.vendedor).trigger('change');
        }
    });
}
selectVendedor();