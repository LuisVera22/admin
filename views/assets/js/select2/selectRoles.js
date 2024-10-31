function selectRoles() {
    $.ajax({
        url: 'json/ajax_rol/rol.php',
        type: 'post',
        data: { crud: 'getRoles' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione sede-]</option>`;
        } else {
            html = `<option value="">[-seleccione sede-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].description}</option>`;
            }
        }
        $('#frmRegistrarPersonal #selectRolPersonal').html(html);
        $('#frmActualizarPersonal #selectRolPersonal').html(html);
    });
}
selectRoles();
