const proveedorModel = new ProveedorModel();
const proveedorController = new ProveedorController(proveedorModel,null);
const proveedorView = new ProveedorView(proveedorController);
proveedorController.view = proveedorView;
proveedorController.view = proveedorView;