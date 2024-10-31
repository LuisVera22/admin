function selectCliente() {
    $.ajax({
        url: 'json/ajax_cliente/cliente.php',
        type: 'post',
        data: { crud: 'getCliente' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione código/cliente-]</option>`;
            htmlFilter = `<option value="">[-seleccione código/cliente-]</option>`;            
        } else {
            html = `<option value="">[-seleccione código/cliente-]</option>`;
            htmlFilter = `<option value="">[-seleccione código/cliente-]</option>`;
            for (let i = 0; i < e.length; i++) {
                if (e[i].names == "" && e[i].lastnames == "" || e[i].names == null && e[i].lastnames == null) {
                    html += `<option value="${e[i].id}">${e[i].codigo} || ${e[i].bussinesnames}</option>`;
                } else if (e[i].bussinesnames == "" || e[i].bussinesnames == null) {
                    html += `<option value="${e[i].id}">${e[i].codigo} || ${e[i].lastnames}, ${e[i].names}</option>`;
                } else if (e[i].bussinesnames != "" || e[i].bussinesnames != null || e[i].names == "" && e[i].lastnames == "" || e[i].names == null && e[i].lastnames == null) {
                    html += `<option value="${e[i].id}">${e[i].codigo} || ${e[i].tradename}</option>`;
                }

                if (e[i].names == "" && e[i].lastnames == "" || e[i].names == null && e[i].lastnames == null) {
                    htmlFilter += `<option value="${e[i].bussinesnames}">${e[i].codigo} || ${e[i].bussinesnames}</option>`;
                } else if (e[i].bussinesnames == "" || e[i].bussinesnames == null) {
                    htmlFilter += `<option value="${e[i].lastnames}, ${e[i].names}">${e[i].codigo} || ${e[i].lastnames}, ${e[i].names}</option>`;
                } else if (e[i].bussinesnames != "" || e[i].bussinesnames != null || e[i].names == "" && e[i].lastnames == "" || e[i].names == null && e[i].lastnames == null) {
                    htmlFilter += `<option value="${e[i].tradename}">${e[i].codigo} || ${e[i].tradename}</option>`;
                }

            }
        }
        $('#selectCliente').html(html);
        $('#frmActualizarPersonal #selectRolPersonal').html(html);
        $('#frmFilterOrdenes #filterCliente').html(htmlFilter);
    });
}
selectCliente();
