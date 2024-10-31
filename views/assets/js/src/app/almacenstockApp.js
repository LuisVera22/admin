const almacenstockModel = new AlmacenstockModel();
const almacenstockController = new AlmacenstockController(almacenstockModel);
const almacenstockView = new AlmacenstockView(almacenstockController);
//almacenprincipalstockController.view = almacenprincipalstockView;
selectManufactxProductoStock('frmRegistrarAlmacenStock',almacenstockController);