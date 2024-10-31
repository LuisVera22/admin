// Inicialización
const empresaModel = new EmpresaModel();
const empresaController = new EmpresaController(empresaModel, null); // Pasa null temporalmente
const empresaView = new EmpresaView(empresaController);
empresaController.view = empresaView; // Asigna la vista después de la creación

// Ahora puedes actualizar el controlador con la vista
empresaController.view = empresaView;