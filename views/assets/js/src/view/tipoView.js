class TipoView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrartipo = $('#frmRegistrarTipos');
        this.formActualizartipo = $('#frmActualizarTipos');

        this.formRegistrartipo.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateTipoFormSubmit(e);
        });

        this.formActualizartipo.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateTipoFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listTipo();
    }
}