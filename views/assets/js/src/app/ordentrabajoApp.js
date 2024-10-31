const ordentrabajoModel = new OrdentrabajoModel();
const ordentrabajoController = new OrdentrabajoController(ordentrabajoModel,null);
const ordentrabajoView = new OrdentrabajoView(ordentrabajoController);
ordentrabajoController.view = ordentrabajoView;