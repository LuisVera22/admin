const salidastockModel = new SalidastockModel();
const salidastockController = new SalidastockController(salidastockModel);
const salidastockView = new SalidastockView(salidastockController);
selectManufactxProductoStock('frmRegistrarSalidaStock',salidastockController);