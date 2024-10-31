class ReposicionStockView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarReposicionStock = $('#frmRegistrarReposicionStock');

        this.formRegistrarReposicionStock.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateReposicionStockFormSubmit(e);
        });
    }
}