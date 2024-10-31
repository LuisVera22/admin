class AlmacenstockView{
    constructor(controller){
        this.controller = controller;
        this.formCargarExcel = $('#frmRegistrarAlmacenStock');

        this.formCargarExcel.submit((e)=>{
            e.preventDefault();
            this.controller.onChargeAlmacenCantidad(e);
        });

        //this.initDataTable();
        this.onclicExcel();
    }
    
   /*  initDataTable(){
        this.controller.listAlmacen();
    } */

    onclicExcel(){
        this.controller.exportarExcel();
    }
}