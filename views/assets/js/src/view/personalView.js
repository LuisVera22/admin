class PersonalView {
    constructor(controller) {
        this.controller = controller;
        this.formRegistrarPersonal = $('#frmRegistrarPersonal');
        this.formActualizarPersonal = $('#frmActualizarPersonal');

        this.formRegistrarPersonal.submit((e) => {
            e.preventDefault();
            this.controller.onCreatePersonalFormSubmit(e);
        });

        this.formActualizarPersonal.submit((e) => {
            e.preventDefault();
            this.controller.onUpdatePersonalFormSubmit(e);
        });

        this.initDataTable();
    }
    initDataTable() {
        this.controller.listPersonal();
    }
}