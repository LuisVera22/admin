class CajachicaView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarCajachica = $('#frmRegistrarCajachica');
        this.formActualizarCajachica = $('#formActualizarCajachica');

        this.formRegistrarCajachica.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateCajachicaFormSubmit(e);
        });

        this.formActualizarCajachica.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateCajachicaFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable(){
        this.controller.listCajachica();
    }
}