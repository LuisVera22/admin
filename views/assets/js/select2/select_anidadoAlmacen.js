formProduct = 'frmRegistrarReposicionAlmacen';
$(`#${formProduct} #selectTipoManu`).change(function () {
    const param = $(this).val();    
    const param2 = $(`#${formProduct} #selectSedes`).val();
    const element = document.querySelector('[aria-labelledby="select2-selectProductosAlmacen-container"]');

    if (param === "") {
        html = `<option value="">[-seleccione producto de almacén-]</option>`;
        $(`#${formProduct} #selectTipos`).html(html);
        $(`#${formProduct} #selectProductosAlmacen`).val('').trigger('change');
        $(`#${formProduct} #selectProductosAlmacen`).attr('disabled', true);
        $(`#${formProduct} #textCantidad`).attr('disabled', true);
        element.style.setProperty('border', '1px solid #d2d6da', 'important');
    } else {
        $.ajax({
            url: 'json/ajax_tipo/tipo.php',
            type: 'post',
            data: { crud: 'getManufactxAlmacen', tipo: param, local: param2 },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione producto de almacén-]</option>`;
            } else {
                html = `<option value="">[-seleccione producto de almacén-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].codigo} || ${e[i].product}</option>`;
                }
            }
            $(`#${formProduct} #selectProductosAlmacen`).html(html);
            $(`#${formProduct} #selectProductosAlmacen`).attr('disabled', false);
            $(`#${formProduct} #textCantidad`).attr('disabled', false);
            element.style.setProperty('border', '1px solid #82d616', 'important');
        });
    }
});