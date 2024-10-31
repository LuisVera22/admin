class SedesView {
    constructor(controller) {
        this.controller = controller;
        this.formRegistrarSede = $('#frmRegistrarSede');
        this.formActualizarSede = $('#frmActualizarSede');
        this.tblListSedes = $('#tblListSedes');

        this.formRegistrarSede.submit((e) => {
            e.preventDefault();
            this.controller.onCreateSedesFormSubmit(e);
        });

        this.formActualizarSede.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateSedesFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listSedes();
    }
}