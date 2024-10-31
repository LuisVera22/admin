function selectMateriales() {
    $.ajax({
        url: 'json/ajax_material/material.php',
        type: 'post',
        data: { crud: 'getMateriales' },
        dataType: 'json'
    }).done(function (e) {
        if (e.length == 0) {
            html = `<option value="">[-seleccione material-]</option>`;
        } else {
            html = `<option value="">[-seleccione material-]</option>`;            
            for (let i = 0; i < e.length; i++) {
                if(e[i].subtype == null || e[i].subtype == ""){
                    html += `<option value="${e[i].id}">${e[i].type.typemanufacturing.description +" || "+ e[i].description + " " +e[i].type.description}</option>`;
                }else{
                    html += `<option value="${e[i].id}">${e[i].type.typemanufacturing.description +" || "+ e[i].description + " " +e[i].type.description + " " +e[i].subtype.description}</option>`;
                }                
            }
        }
        $('#frmRegistrarClase #selectMateriales').html(html);
        $('#frmActualizarClase #selectMateriales').html(html);        
    });
}
selectMateriales();