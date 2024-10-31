const cotizacionModel = new CotizacionModel();
const cotizacionController = new CotizacionController(cotizacionModel,null);
const cotizacionView = new CotizacionView(cotizacionController);
cotizacionController.view = cotizacionView;
cotizacionController.view = cotizacionView;