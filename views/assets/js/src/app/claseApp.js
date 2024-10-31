const claseModel = new ClaseModel();
const claseController = new ClaseController(claseModel, null);
const claseView = new ClaseView(claseController);
claseController.view = claseView;