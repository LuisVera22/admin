function handleProductoChange(formProduct) {
    $(`#${formProduct} #selectTipoManu`).change(function () {
        const param = $(this).val();
        
        if (param === "" || param === null) {
            /* html = `<option value="">[-seleccione tipo-]</option>`;
            $(`#${formProduct} #selectTipos`).html(html); */
            $(`#${formProduct} #selectTipos`).val('').trigger('change');
            $(`#${formProduct} #selectSubTipos`).val('').trigger('change');
            $(`#${formProduct} #selectMateriales`).val('').trigger('change');
            $(`#${formProduct} #selectClases`).val('').trigger('change');
            $(`#${formProduct} #selectSubClases`).val('').trigger('change');
        } else {
            $.ajax({
                url: 'json/ajax_tipo/tipo.php',
                type: 'post',
                data: { crud: 'getManufactxTipos', idtipo: param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione tipo-]</option>`;
                } else {
                    html = `<option value="">[-seleccione tipo-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}">${e[i].description}</option>`;
                    }
                }
                $(`#${formProduct} #selectTipos`).html(html);
            });
        }
    });

    $(`#${formProduct} #selectTipos`).change(function () {
        const param = $(this).val();
        if (param !== null && param !== "") {
            $.ajax({
                url: 'json/ajax_subtipo/subTipo.php',
                type: 'post',
                data: { crud: 'getSubTiposxTipos', idtipo: param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione sub tipo-]</option>`;
                    $(`#${formProduct} #show_subtipo`).hide();
                    $(`#${formProduct} #selectSubTipos`).val('').trigger("change");
                    $(`#${formProduct} #selectSubTipos`).removeAttr('required');
                    select2CompleteMaterial(param);
                } else {
                    $(`#${formProduct} #show_subtipo`).show();
                    $(`#${formProduct} #selectSubTipos`).prop('required', true);
                    $(`#${formProduct} #selectMateriales`).val('').trigger("change");
                    html = `<option value="">[-seleccione sub tipo-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}">${e[i].description}</option>`;
                    }
                }
                $(`#${formProduct} #selectSubTipos`).html(html);
            });
        } else {
            $(`#${formProduct} #show_subtipo`).hide();
            $(`#${formProduct} #selectSubTipos`).val('').trigger("change");
            $(`#${formProduct} #selectSubTipos`).removeAttr('required');
        }
    });

    function select2CompleteMaterial(param) {        
        $.ajax({
            url: 'json/ajax_material/material.php',
            type: 'post',
            data: { crud: 'getMaterialxTipos', idtipo: param },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione material-]</option>`;
            } else {
                html = `<option value="">[-seleccione material-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].description}</option>`;
                }
            }
            $(`#${formProduct} #selectMateriales`).html(html);
            $(`#frmActualizarProductos #selectMateriales`).html(html);
        });
    }

    $(`#${formProduct} #selectSubTipos`).change(function () {
        const param = $(this).val();
        if (param === null || param === "") {
            html = `<option value="">[-seleccione material-]</option>`;
            $(`#${formProduct} #selectMateriales`).html(html);
        } else {
            $.ajax({
                url: 'json/ajax_material/material.php',
                type: 'post',
                data: { crud: 'getMaterialxSubtipo', idsubtipo: param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione material-]</option>`;
                } else {
                    html = `<option value="">[-seleccione material-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}">${e[i].description}</option>`;
                    }
                }                
                $(`#${formProduct} #selectMateriales`).html(html);
            });
        }
    });

    $(`#${formProduct} #selectMateriales`).change(function () {
        const param = $(this).val();
        if (param === null || param === "") {
            html = `<option value="">[-seleccione clase-]</option>`;
            $(`#${formProduct} #selectClases`).html(html);
        } else {
            $.ajax({
                url: 'json/ajax_clase/clase.php',
                type: 'post',
                data: { crud: 'getClasexMaterial', idmaterial: param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione clase-]</option>`;
                } else {
                    html = `<option value="">[-seleccione clase-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}">${e[i].description}</option>`;
                    }
                }                
                $(`#${formProduct} #selectClases`).html(html);
            });
        }
    });

    $(`#${formProduct} #selectClases`).change(function () {
        const param = $(this).val();
        if (param !== null && param !== "") {
            $.ajax({
                url: 'json/ajax_subclase/subclase.php',
                type: 'post',
                data: { crud: 'getSubClasexClase', idclase: param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione sub clase-]</option>`;
                    $(`#${formProduct} #show_subclase`).hide();
                    $(`#${formProduct} #selectSubClases`).val('').trigger("change");
                    $(`#${formProduct} #selectSubClases`).removeAttr('required');
                } else {
                    $(`#${formProduct} #show_subclase`).show();
                    $(`#${formProduct} #selectSubClases`).prop('required', true);
                    $(`#${formProduct} #selectSubClases`).val('').trigger("change");
                    html = `<option value="">[-seleccione sub clase-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}">${e[i].description}</option>`;
                    }
                }
                $(`#${formProduct} #selectSubClases`).html(html);
            });
        } else {
            $(`#${formProduct} #show_subclase`).hide();
            $(`#${formProduct} #selectSubClases`).val('').trigger("change");
            $(`#${formProduct} #selectSubClases`).removeAttr('required');
        }
    });
}
handleProductoChange('frmRegistrarProductos');