class CotizacionView{
    constructor(controller){
        this.controller = controller;
        this.initDataTable();
        this.onclickFactura();
        this.freezingCampos();
        this.seendAlmacen();
        this.seendAlmacenRbc();
    }
    initDataTable(){
        this.controller.listCotizaciones();
    }
    onclickFactura(){
        this.controller.convertirFactura();
    }
    freezingCampos()
    {
        this.controller.bloqueCampos();
    }
    seendAlmacen(){
        this.controller.enviarMialmacen();
    }
    seendAlmacenRbc(){
        this.controller.enviarRbcalmacen();
    }
}