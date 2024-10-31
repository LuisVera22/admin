const clienteModel = new ClienteModel();
const clienteController = new ClienteController(clienteModel,null);
const clienteView = new ClienteView(clienteController);
clienteController.view = clienteView;