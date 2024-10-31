function selectTipos() {
    $.ajax({
        url: 'json/ajax_tipo/tipo.php',
        type: 'post',
        data: { crud: 'getTipos' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione tipo-]</option>`;
        } else {
            html = `<option value="">[-seleccione tipo-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].typemanufacturing.description} - ${e[i].description}</option>`;
            }
        }
        $('#frmRegistrarSubTipos #selectTipos').html(html);
        $('#frmActualizarSubTipos #selectTipos').html(html);

        $('#frmRegistrarMateriales #selectTipos').html(html);
        $('#frmActualizarMateriales #selectTipos').html(html);
    });
}
selectTipos();

$('#frmRegistrarMateriales #selectTipos').change(function () {
    param = $(this).val();
    if (param !== null && param !== "") {
        $.ajax({
            url: 'json/ajax_subtipo/subTipo.php',
            type: 'post',
            data: { crud: 'getSubTiposxTipos', idtipo: param },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                $('#frmRegistrarMateriales #show_subtipo').hide();
                $('#frmRegistrarMateriales #selectSubTipos').val('').trigger("change");
                $('#frmRegistrarMateriales #selectSubTipos').removeAttr('required');
            } else {
                $('#frmRegistrarMateriales #show_subtipo').show();
                $('#frmRegistrarMateriales #selectSubTipos').prop('required', true);
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].description}</option>`;
                }
            }
            $('#frmRegistrarMateriales #selectSubTipos').html(html);
        });
    } else {
        $('#frmRegistrarMateriales #show_subtipo').hide();

        $('#frmRegistrarMateriales #selectSubTipos').val('').trigger("change");
        $('#frmRegistrarMateriales #selectSubTipos').removeAttr('required');
    }
});

$('#frmActualizarMateriales #selectTipos').change(function () {
    param = $(this).val();
    if (param !== null && param !== "") {
        $.ajax({
            url: 'json/ajax_subtipo/subTipo.php',
            type: 'post',
            data: { crud: 'getSubTiposxTipos', idtipo: param },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                $('#frmActualizarMateriales #show_subtipo').hide();
                $('#frmActualizarMateriales #selectSubTipos').val('').trigger("change");
                $('#frmActualizarMateriales #selectSubTipos').removeAttr('required');
            } else {
                $('#frmActualizarMateriales #show_subtipo').show();
                $('#frmActualizarMateriales #selectSubTipos').prop('required', true);
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].description}</option>`;
                }
            }
            $('#frmActualizarMateriales #selectSubTipos').html(html);            
        });
    } else {
        $('#frmActualizarMateriales #show_subtipo').hide();

        $('#frmActualizarMateriales #selectSubTipos').val('').trigger("change");
        $('#frmActualizarMateriales #selectSubTipos').removeAttr('required');
    }
});

function selectTiposxSubTipos(subTipo) {
    param = $('#frmActualizarMateriales #selectTipos').val();    
    if (param !== null && param !== "") {
        $.ajax({
            url: 'json/ajax_subtipo/subTipo.php',
            type: 'post',
            data: { crud: 'getSubTiposxTipos', idtipo: param },
            dataType: 'json'
        }).done(function (e) {
            if (e.length == 0) {
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                $('#frmActualizarMateriales #show_subtipo').hide();
                $('#frmActualizarMateriales #selectSubTipos').val('').trigger("change");
                $('#frmActualizarMateriales #selectSubTipos').removeAttr('required');
            } else {
                $('#frmActualizarMateriales #show_subtipo').show();
                $('#frmActualizarMateriales #selectSubTipos').prop('required', true);
                html = `<option value="">[-seleccione sub tipo-]</option>`;
                for (let i = 0; i < e.length; i++) {
                    html += `<option value="${e[i].id}">${e[i].description}</option>`;
                }
            }
            $('#frmActualizarMateriales #selectSubTipos').html(html);
            $("#frmActualizarMateriales #selectSubTipos").val(subTipo).trigger('change');
        });
    }
}
