class DocumentoventasView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrardocumentoventa = $('#frmRegistrarDocumentoVenta');
        this.formActualizardocumentoventa = $('#frmActualizarDocumentoVenta');

        this.formRegistrardocumentoventa.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateDocumentoVentaFormSubmit(e);
        });

        this.formActualizardocumentoventa.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateDocumentoVentaFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listDocumentoVentas();
    }
}