class SalidastockView{
    constructor(controller){
        this.controller = controller;
        this.formCargarExcel = $('#frmRegistrarSalidaStock');

        this.formCargarExcel.submit((e)=>{
            e.preventDefault();
            this.controller.onChargeSalidaCantidad(e);
        });

        this.onclicExcel();
    }

    onclicExcel(){
        this.controller.exportarExcel();
    }
}