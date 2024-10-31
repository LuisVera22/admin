class AlmacenproductofabricacionView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarAlmacenProductosFabricacionDig = $('#frmRegistrarAlmacenProductosFabricacionDig');
        this.formRegistrarAlmacenProductosFabricacionConv = $('#frmRegistrarAlmacenProductosFabricacionConv');

        this.formRegistrarAlmacenProductosFabricacionDig.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateAlmacenProductFabricacionDigitalFormSubmit(e);
        });

        this.formRegistrarAlmacenProductosFabricacionConv.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateAlmacenProductFabricacionConvencionalFormSubmit(e);
        });
    }
}