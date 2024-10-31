class ClaseView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarclases = $('#frmRegistrarClase');
        this.formActualizarclases = $('#frmActualizarClase');

        this.formRegistrarclases.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateClasesFormSubmit(e);
        });

        this.formActualizarclases.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateClasesFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listClases();
    }
}