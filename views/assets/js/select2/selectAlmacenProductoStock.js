function selectManufactxProductoStock(formProduct) {
    const param = $(`#${formProduct} #selectTrabajo`).val();

    if (param === "") {
        html = `<option value="">[-seleccione trabajo-]</option>`;
        $(`#${formProduct} #selectTrabajo`).html(html);
    } else {
        $.ajax({
            url: 'json/ajax_tipomanufactura/tipoManufactura.php',
            type: 'post',
            data: { crud: 'getManufactxTrabajo', tipo: param },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione tipo de Manufacturación-]</option>`;
            } else {
                html = `<option value="">[-seleccione tipo de Manufacturación-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}" selected>${e[i].description}</option>`;
                }
            }
            $(`#${formProduct} #selectManufactura`).html(html);
            const paramManufactura = $(`#${formProduct} #selectManufactura`).val();
            productosStock(formProduct, paramManufactura);
        });
    }
};
selectManufactxProductoStock('frmRegistrarAlmacenProductosStock');


function productosStock(formProductAlmacen, paramManufactura) {
    
    if (paramManufactura === "") {
        html = `<option value="">[-seleccione producto-]</option>`;
        $(`#${formProductAlmacen} #selectProductos`).html(html);
    } else {
        $.ajax({
            url: 'json/ajax_producto/producto.php',
            type: 'post',
            data: { crud: 'getProductoxManufactura', tipo: paramManufactura },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione producto-]</option>`;
            } else {
                html = `<option value="">[-seleccione producto-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].abrevmaterials + ' ' + e[i].abrevclasses + ' ' + e[i].abrevsubclasses}</option>`;
                }
            }
            $(`#${formProductAlmacen} #selectProductos`).html(html);
        });
    }
};
