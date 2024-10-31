const cajachicaModel = new cajaChicaModel();
const cajachicaController = new cajaChicaController(cajachicaModel,null);
const cajachicaView = new cajaChicaView(cajachicaController);
cajachicaController.view = cajachicaView;