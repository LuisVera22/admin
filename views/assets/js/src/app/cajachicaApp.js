const cajachicaModel = new CajachicaModel();
const cajachicaController = new CajachicaController(cajachicaModel, null);
const cajachicaView = new CajachicaView(cajachicaController);
cajachicaController.view = cajachicaView;