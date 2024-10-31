class AlmacenproductostockView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarAlmacenProductosStock = $('#frmRegistrarAlmacenProductosStock');        

        this.formRegistrarAlmacenProductosStock.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateAlmacenProductStockFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable(){
        this.controller.listAlmacenProductStock();
    }
}