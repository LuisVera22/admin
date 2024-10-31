class EmpresaView {
    constructor(controller) {
        this.controller = controller;
        this.formEmpresa = $('#frmEmpresa');
        this.formImage = $('#frmImage');
        this.formLocal = $('#frmLocal');

        this.formEmpresa.submit((e) => {
            e.preventDefault();
            this.controller.onEmpresaFormSubmit(e)
        }
        );
        this.formImage.submit((e) => {
            e.preventDefault();
            this.controller.onImageFormSubmit(e)
        });

        // Agregar el manejador de eventos onchange
        $('#imgBusiness').on('change', (e) => this.preview(e));
        $('#icon-cerrar').on('click', () => this.deleteImg());
        $('#frmLocal #btnEnviarLocal').on('click', () => this.onLocalFormSubmit());

        this.showBusiness(); // Llama a la función inicialmente
        this.deleteImg();
        this.btnImageDisabled();
    }

    showBusiness() {
        this.controller.showBusiness();
    }

    preview(e) {
        this.controller.preview(e);
    }

    deleteImg() {
        this.controller.deleteImg();
    }

    btnImageDisabled() {
        this.controller.btnImageDisabled();
    }

    onLocalFormSubmit() {
        this.controller.onLocalFormSubmit();
    }
}
