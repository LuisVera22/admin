class RolesView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarRoles = $('#frmRegistrarRoles');
        this.formActualizarRoles = $('#frmActualizarRoles');

        this.formRegistrarRoles.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateRolesFormSubmit(e);
        });

        this.formActualizarRoles.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateRolesFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listRoles();
    }
}