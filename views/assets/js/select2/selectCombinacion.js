function selectCombinacion() {
    $.ajax({
        url: 'json/ajax_combinacion/combinacion.php',
        type: 'post',
        data: { crud: 'getCombinacion' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione medida-]</option>`;
        } else {
            html = `<option value="">[-seleccione medida-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].description}</option>`;
            }
        }
        var selectors = 
            '#frmRegistrarAlmacenProductosStock #selectTipoCombinacion,'+
            '#frmRegistrarAlmacenProductosFabricacionDig #selectTipoCombinacionDig,'+
            '#frmRegistrarAlmacenProductosFabricacionConv #selectTipoCombinacionConv';

        $(selectors).html(html);

    });
}
selectCombinacion();