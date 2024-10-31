class CombinacionView{
    constructor(controller){
        this.controller = controller;

        this.formRegistrarCombinacion = $('#frmRegistrarCilEsfAdd');        

        this.formRegistrarCombinacion.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateCombinacionFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable(){
        this.controller.listCombinacion();
    }
}