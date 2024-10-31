const localModel = new LocalModel();
const localController = new LocalController(localModel,null);
const localView = new LocalView(localController);
localController.view = localView;
localController.view = localView;