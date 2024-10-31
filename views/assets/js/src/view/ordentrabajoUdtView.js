class OrdentrabajoUdtView {
    constructor(controller) {
        this.controller = controller;

        this.changeCliente();
        this.onclickAgregarItem();
        this.onclickViewCuotas();
        this.onselectTablaServicio();
        this.onclickAgregarCuota();
        this.onclickRetroceder();
        this.changeSaldo();
        this.onclickAlturas();
        this.onclickDips();
        this.onclickDiametros();
        this.onclickTablaProductos();
        this.onclickBtnEliminarItems();
        this.onclickBtnEliminarItemsCuotas();
        this.seeUpdateSecondTable();
        this.seeUpdateSecondTableCuotas();
        this.onclickBtnActualizarProducto();
        this.seeViewUpdateQuotation();
        this.onclickActualizarOrdenTrabajo();
        this.freezingCampos();
        this.onseeCompleteCampos();
    }

    changeCliente() {
        this.controller.mostrandodataCliente();
    }
    onclickAgregarItem() {
        this.controller.mostrandoManufacturacion();
    }
    onclickViewCuotas() {
        this.controller.mostrandoCuotas();
    }
    onselectTablaServicio() {
        this.controller.tablaServicios();
    }    
    onclickAgregarCuota(){
        this.controller.tablaCuotas();
    }
    onclickRetroceder(){
        this.controller.btnBack();
    }
    changeSaldo(){
        this.controller.calcularSaldo();
    }
    onclickAlturas(){
        this.controller.mostrandoAlturas();
    }
    onclickDips(){
        this.controller.mostrandoDips();
    }
    onclickDiametros(){
        this.controller.mostrandoDiametros();
    }
    onclickTablaProductos(){
        this.controller.tablaProductos();
    }
    onclickBtnEliminarItems(){
        this.controller.eliminarItems();
    }
    onclickBtnEliminarItemsCuotas(){
        this.controller.eliminarItemsCuotas();
    }
    onclickBtnActualizarProducto(){
        this.controller.actualizarItemProducto();
    }
    seeUpdateSecondTable(){
        this.controller.updateSecondTable();
    }
    seeUpdateSecondTableCuotas(){
        this.controller.updateSecondTableCuotas();
    }
    seeViewUpdateQuotation()
    {
        this.controller.obtenerValoresParaActualizar();
    }
    onclickActualizarOrdenTrabajo()
    {
        this.controller.onUpdateOrdenTrabajoFromSubmit();
    }
    freezingCampos()
    {
        this.controller.bloqueCampos();
    }
    onseeCompleteCampos()
    {
        this.controller.seleccionarProducto();
    }
}