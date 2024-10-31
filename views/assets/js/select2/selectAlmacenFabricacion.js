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
            $(`#${formProduct} #selectManufacturaDig`).html(html);
            //$(`#selectManufacturaStock`).html(html);
            controller.listAlmacenDigital();
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
            $(`#${formProduct} #selectManufacturaConv`).html(html);
            //$(`#selectManufacturaStock`).html(html);
            controller.listAlmacenConvencional();
        });
    }
};