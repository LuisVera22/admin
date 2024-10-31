const productoModel = new ProductoModel();
const productoController = new ProductoController(productoModel);
const productoView = new ProductoView(productoController);
productoController.view = productoView;