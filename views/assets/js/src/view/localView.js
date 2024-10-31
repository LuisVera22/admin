class LocalView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarLocal = $('#frmRegistrarLocal');
        this.formActualizarLocal = $('#frmActualizarLocal');
        this.formRegistrarCorrelativoLocal = $('#frmRegistrarCorrelativoLocal');

        this.formRegistrarLocal.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateLocalesFormSubmit(e);
        });

        this.formActualizarLocal.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateLocalesFormSubmit(e);
        });

        this.formRegistrarCorrelativoLocal.submit((e) => {
            e.preventDefault();
            this.controller.onCreateCorrelativoLocalFormsubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listLocales();
    }
}