function selectMensajero() {
    $.ajax({
        url: 'json/ajax_personal/personal.php',
        type: 'post',
        data: { crud: 'listRolMensajero',rol:'mensajero' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione mensajero-]</option>`;
            htmlFilter = `<option value="">[-seleccione mensajero-]</option>`;
        } else {
            html = `<option value="">[-seleccione mensajero-]</option>`;
            htmlFilter = `<option value="">[-seleccione mensajero-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].lastname}, ${e[i].name}</option>`;
                htmlFilter += `<option value="${e[i].lastname}, ${e[i].name}">${e[i].lastname}, ${e[i].name}</option>`;
            }
        }

        $('#selectMensajero').html(html);
        $('#frmFilterOrdenes #filterMensajero').html(html);
    });
}
selectMensajero();