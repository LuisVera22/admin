class CambiarpasswordView {
    constructor(controller) {
        this.controller = controller;
        this.formChangePassword = $('#frmChangePassword');

        this.formChangePassword.submit((e)=>{
            e.preventDefault();
            this.controller.onChangePasswordFormSubmit(e);
        });
    }
}
