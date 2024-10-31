class ReposicionFabricacionView{
    constructor(controller) {
        this.controller = controller;
        this.formRegistrarReposicionDigital= $('#frmRegistrarReposicionDigital');
        this.formRegistrarReposicionConvencional= $('#frmRegistrarReposicionConvencional');

        this.formRegistrarReposicionDigital.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateReposicionDigitalFormSubmit(e);
        });

        this.formRegistrarReposicionConvencional.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateReposicionConvencionalFormSubmit(e);
        });
    }
}