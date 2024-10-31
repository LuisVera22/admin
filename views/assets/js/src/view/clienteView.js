class ClienteView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarCliente = $('#frmRegistrarCliente');
        this.formActualizarCliente = $('#frmActualizarCliente');

        this.formRegistrarCliente.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateClienteFormSubmit(e);
        });

        this.formActualizarCliente.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateClienteFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listCliente();
    }
}