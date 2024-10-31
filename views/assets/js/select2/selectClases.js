function selectClases() {
    $.ajax({
        url: 'json/ajax_clase/clase.php',
        type: 'post',
        data: { crud: 'getClases' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione clase-]</option>`;
        } else {
            html = `<option value="">[-seleccione clase-]</option>`;
            for (let i = 0; i < e.length; i++) {
                if (e[i].materials.subtype == null || e[i].materials.subtype == "") {
                    html += `<option value="${e[i].id}">${e[i].materials.type.typemanufacturing.description + " || " + e[i].materials.description + " " + e[i].materials.type.description + " " + e[i].description}</option>`;
                } else {
                    html += `<option value="${e[i].id}">${e[i].materials.type.typemanufacturing.description + " || " + e[i].materials.description + " " + e[i].materials.type.description + " " + e[i].materials.subtype.description + " " + e[i].description}</option>`;
                }
            }
        }
        $('#frmRegistrarSubClase #selectClases').html(html);
        $('#frmActualizarSubClase #selectClases').html(html);
    });
}
selectClases();