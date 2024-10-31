const correlativoModel = new CorrelativoModel();
const correlativoController = new CorrelativoController(correlativoModel,null);
const correlativoView = new CorrelativoView(correlativoController);
correlativoController.view = correlativoView;