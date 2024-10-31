const combinacionModel = new CombinacionModel();
const combinacionController = new CombinacionController(combinacionModel,null);
const combinacionView = new CombinacionView(combinacionController);
combinacionController.view = combinacionView;
