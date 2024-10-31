class ServicioView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarServicio = $('#frmRegistrarServicios');
        this.formActualizarServicio = $('#frmActualizarServicios');

        this.formRegistrarServicio.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateServicioFormSubmit(e);
        });

        this.formActualizarServicio.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateServicioFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable(){
        this.controller.listServicio();
    }
}