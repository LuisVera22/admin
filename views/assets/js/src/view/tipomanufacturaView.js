class TipomanufacturaView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrartipomanufactura = $('#frmRegistrarTipoManufactura');

        this.formRegistrartipomanufactura.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateTipomanufacturaFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listTipomanufactura();
    }
}