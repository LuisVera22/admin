class SubtipoView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarsubtipo = $('#frmRegistrarSubTipos');
        this.formActualizarsubtipo = $('#frmActualizarSubTipos');

        this.formRegistrarsubtipo.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateSubTipoFormSubmit(e);
        });

        this.formActualizarsubtipo.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateSubTipoFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listSubTipo();
    }
}