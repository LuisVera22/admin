const subtipoModel = new SubtipoModel();
const subtipoController = new SubtipoController(subtipoModel, null);
const subtipoView = new SubtipoView(subtipoController);
subtipoController.view = subtipoView;
subtipoController.view = subtipoView;