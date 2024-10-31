class SubclaseView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarsubclase = $('#frmRegistrarSubClase');
        this.formActualizarsubclase = $('#frmActualizarSubClase');

        this.formRegistrarsubclase.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateSubClaseFormSubmit(e);
        });

        this.formActualizarsubclase.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateSubClaseFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable(){
        this.controller.listSubClase();
    }
}