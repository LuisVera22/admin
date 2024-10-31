class CorrelativoView {
    constructor(controller) {
        this.controller = controller;
        this.formRegistrarCorrelativo = $('#frmRegistrarCorrelativo');
        this.formActualizarCorrelativo = $('#frmActualizarCorrelativo');        

        this.formRegistrarCorrelativo.submit((e) => {
            e.preventDefault();
            this.controller.onCreateCorrelativoFormSubmit(e);
        });

        this.formActualizarCorrelativo.submit((e) => {
            e.preventDefault();
            this.controller.onUpdateCorrelativoFormSubmit(e);
        });        

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listCorrelativo();
    }
}