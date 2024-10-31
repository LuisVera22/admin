function selectManufactxProductoFabDig(formProduct,controller) {
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
                    const isSelected = (i === 0) ? 'selected' : '';
                    html += `<option value="${e[i].id}" ${isSelected}>${e[i].description}</option>`;
                }
            }
            $(`#${formProduct} #selectManufactura`).html(html);
            const paramManufactura = $(`#${formProduct} #selectManufactura`).val();
            reposicionDigitalManufactura(formProduct,paramManufactura);
            controller.tblReposicionDigital();
        });
    }
};

function selectManufactxProductoFabConv(formProduct,controller) {
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
                    const isSelected = (i === 1) ? 'selected' : '';
                    html += `<option value="${e[i].id}" ${isSelected}>${e[i].description}</option>`;
                }
            }
            $(`#${formProduct} #selectManufactura`).html(html);
            const paramManufactura = $(`#${formProduct} #selectManufactura`).val();
            reposicionConvencionalManufactura(formProduct,paramManufactura);
            controller.tblReposicionConvencional();
        });
    }
};

function reposicionDigitalManufactura(formProductAlmacen, paramManufactura) {
    
    if (paramManufactura === "") {
        html = `<option value="">[-seleccione producto-]</option>`;
        $(`#${formProductAlmacen} #selectCodigoProductoDig`).html(html);
    } else {
        $.ajax({
            url: 'json/ajax_reposicion/reposicion.php',
            type: 'post',
            data: { crud: 'getReposicionxManufact', tipo: paramManufactura },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione código producto-]</option>`;
            } else {
                html = `<option value="">[-seleccione código producto-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].codigo}">${e[i].codigo}</option>`;
                }
            }
            $(`#${formProductAlmacen} #selectCodigoProductoDig`).html(html);
        });
    }
};

function reposicionConvencionalManufactura(formProductAlmacen, paramManufactura) {
    
    if (paramManufactura === "") {
        html = `<option value="">[-seleccione producto-]</option>`;
        $(`#${formProductAlmacen} #selectCodigoProductoConv`).html(html);
    } else {
        $.ajax({
            url: 'json/ajax_reposicion/reposicion.php',
            type: 'post',
            data: { crud: 'getReposicionxManufact', tipo: paramManufactura },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione código producto-]</option>`;
            } else {
                html = `<option value="">[-seleccione código producto-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].codigo}">${e[i].codigo}</option>`;
                }
            }
            $(`#${formProductAlmacen} #selectCodigoProductoConv`).html(html);
        });
    }
};