const tipoModel = new TipoModel();
const tipoController = new TipoController(tipoModel,null);
const tipoView = new TipoView(tipoController);
tipoController.view = tipoView;