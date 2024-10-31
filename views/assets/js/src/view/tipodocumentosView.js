class TipodocumentosView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrartipodocumento = $('#frmRegistrarDocumentoIdentidad');
        this.formActualizartipodocumento = $('#frmActualizarDocumentoIdentidad');

        this.formRegistrartipodocumento.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateTipoDocumentoFormSubmit(e);
        });

        this.formActualizartipodocumento.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateTipoDocumentoFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listTipoDocumentos();
    }
}