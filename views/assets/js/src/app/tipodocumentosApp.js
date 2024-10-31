const tipodocumentosModel = new TipoDocumentosModel();
const tipodocumentosController = new TipodocumentosController(tipodocumentosModel,null);
const tipodocumentosView = new TipodocumentosView(tipodocumentosController);
tipodocumentosController.view = tipodocumentosView;
tipodocumentosController.view = tipodocumentosView;