const sedesModel = new SedesModel();
const sedesController = new SedesController(sedesModel,null);
const sedesView = new SedesView(sedesController);
sedesController.view = sedesView;
sedesController.view = sedesView;