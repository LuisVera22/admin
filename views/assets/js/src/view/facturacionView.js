class FacturacionView{
    constructor(controller){
        this.controller = controller;
        this.setViewCotizacionGroup();
        this.onclickRetroceder();
    }

    setViewCotizacionGroup()
    {
        this.controller.viewCotizacionGroup();
    }
    onclickRetroceder(){
        this.controller.btnBack();
    }
}