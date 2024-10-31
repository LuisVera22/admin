function selectSedes() {
    $.ajax({
        url: 'json/ajax_sede/sede.php',
        type: 'post',
        data: { crud: 'getSedes' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione sede-]</option>`;
            htmlFilter = `<option value="">[-seleccione sede-]</option>`;
        } else {
            html = `<option value="">[-seleccione sede-]</option>`;
            htmlFilter = `<option value="">[-seleccione sede-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].description}</option>`;
                htmlFilter += `<option value="${e[i].description}">${e[i].description}</option>`;
            }
        }
        $('#frmRegistrarLocal #selectSede').html(html);
        $('#frmActualizarLocal #selectSede').html(html);
        $('#frmFilterOrdenes #filterSede').html(htmlFilter);        
    });
}
selectSedes();