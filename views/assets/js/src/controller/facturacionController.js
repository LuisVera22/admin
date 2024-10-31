class FacturacionController{
    constructor(model,view){
        this.model = model;
        this.view = view;        
    }

    viewCotizacionGroup(){
        let valores = sessionStorage.getItem('faturarIdOrdenes');
        console.log(valores);
        /* $.ajax({

        }) */
    }

    btnBack() {
        $('#btn_retroceder,#btn_cancelar').click(function () {
            sessionStorage.removeItem(`selectedItems`);
            sessionStorage.removeItem(`faturarIdOrdenes`);
            sessionStorage.removeItem(`selectedCuotas`);

            sessionStorage.removeItem(`tabID`);
        });
    }
}