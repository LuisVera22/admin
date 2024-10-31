const ordentrabajoUdtModel = new OrdentrabajoUdtModel();
const ordentrabajoUdtController = new OrdentrabajoUdtController(ordentrabajoUdtModel,null);
const ordentrabajoUdtView = new OrdentrabajoUdtView(ordentrabajoUdtController);
ordentrabajoUdtController.view = ordentrabajoUdtView;