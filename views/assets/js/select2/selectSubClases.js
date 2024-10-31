function selectSubClases() {
    $.ajax({
        url: 'json/ajax_subclase/subclase.php',
        type: 'post',
        data: { crud: 'getSubClases' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione subclase-]</option>`;            
        } else {
            html = `<option value="">[-seleccione subclase-]</option>`;            
            for (let i = 0; i < e.length; i++) {
                html += `<option value="${e[i].id}">${e[i].description}</option>`;                
            }
        }
        $('#frmRegistrarClases #selectSubClases').html(html);
        $('#frmActualizarClase #selectSubClases').html(html);
    });
}
selectSubClases();
