function selectProductos() {
    $.ajax({
        url: 'json/ajax_producto/producto.php',
        type: 'post',
        data: { crud: 'getProductos' },
        dataType: 'json'
    }).done(function (e) {
        console.log(e);

        if (e.length == 0) {
            html = `<option value="">[-seleccione local || producto-]</option>`;
        } else {
            html = `<option value="">[-seleccione local || producto-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].productsxstore.store.address + " - " + e[i].productsxstore.store.headquarters.description + " || " + e[i].typemanufacturing.description + " - " + e[i].description}</option>`;
            }
        }
        $('#frmRegistrarProductosAlmacen #selectProductos').html(html);
    });
}
selectProductos();

function handleAlmacenChange(formAlmacen) {
    $(`#${formAlmacen} #selectProductos`).change(function () {
        const param = $(this).val();
        if (param === "" || param === null) {
            $(`#${formAlmacen} #selectSedes`).val('').trigger('change');
            $(`#${formAlmacen} #selectTipoManu`).val('').trigger('change');
        } else {
            $.ajax({
                url: 'json/ajax_producto/producto.php',
                type: 'post',
                data: { crud: 'getProductosId', param: param },
                dataType: 'json'
            }).done(function (e) {
                console.log(e);
                $(`#${formAlmacen} #selectSedes`).val(e.store).trigger('change');
                $(`#${formAlmacen} #selectTipoManu`).val(e.typemanufacturing).trigger('change');
            });
        }


    });
}
handleAlmacenChange('frmRegistrarProductosAlmacen');