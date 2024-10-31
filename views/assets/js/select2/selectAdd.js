function selectAdd() {
    $.ajax({
        url: 'views/src/json/add.json',
        type: 'post',
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione add-]</option>`;
            html2 = `<option value="">[-Add-]</option>`;
        } else {
            html = `<option value="">[-seleccione add-]</option>`;
            html2 = `<option value="">[-Add-]</option>`;
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
                html2 += `<option value="${e[i].id}">${e[i].descripcion} </option>`;
            }
        }

        $('#frmRegistrarCilEsfAdd #selectAdd').html(html);
        $('#frmActualizarCilEsfAdd #selectAdd').html(html);

        $('#frmRegistrarItems #selectAddOD').html(html2);
        $('#frmRegistrarItems #selectAddOI').html(html2);
        
        $('#frmEditarItems #selectAddOD').html(html2);
        $('#frmEditarItems #selectAddOI').html(html2);
    });
}
selectAdd();