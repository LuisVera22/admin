const servicioModel = new ServicioModel();
const servicioController = new ServicioController(servicioModel);
const servicioView = new ServicioView(servicioController);
servicioController.view = servicioView;
servicioController.view = servicioView;