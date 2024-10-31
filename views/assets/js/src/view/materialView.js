class MaterialView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarmateriales = $('#frmRegistrarMateriales');
        this.formActualizarmateriales = $('#frmActualizarMateriales');

        this.formRegistrarmateriales.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateMaterialesFormSubmit(e);
        });

        this.formActualizarmateriales.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateMaterialesFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listMateriales();
    }
}