class ProveedorView {
    constructor(controller) {
        this.controller = controller;
        this.formRegistrarProveedor = $('#frmRegistrarProveedor');
        this.formActualizarProveedor = $('#frmActualizarProveedor');

        this.formRegistrarProveedor.submit((e) => {
            e.preventDefault();
            this.controller.onCreateProveedorFormSubmit(e);
        });

        this.formActualizarProveedor.submit((e) => {
            e.preventDefault();
            this.controller.onUpdateProveedorFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listProveedor();
    }
}