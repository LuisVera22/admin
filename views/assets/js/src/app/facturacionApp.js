const facturacionModel = new FacturacionModel();
const facturacionController = new FacturacionController(facturacionModel,null);
const facturacionView = new FacturacionView(facturacionController);
facturacionController.view = facturacionView;
