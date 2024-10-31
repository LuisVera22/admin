class ProductoView{
    constructor(controller){
        this.controller = controller;
        this.formRegistrarProducto = $('#frmRegistrarProductos');
        this.formActualizarProducto = $('#frmActualizarProductos');

        this.formRegistrarProducto.submit((e)=>{
            e.preventDefault();
            this.controller.onCreateProductoFormSubmit(e);
        });

        this.formActualizarProducto.submit((e)=>{
            e.preventDefault();
            this.controller.onUpdateProductoFormSubmit(e);
        });

        this.initDataTable();        
    }
    initDataTable(){
        this.controller.listProducto();
    }
    
}