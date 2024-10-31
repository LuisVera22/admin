// Inicialización
const loginModel = new LoginModel();
const loginController = new LoginController(loginModel, null); // Pasa null temporalmente
const loginView = new LoginView(loginController);
loginController.view = loginView; // Asigna la vista después de la creación

// Ahora puedes actualizar el controlador con la vista
loginController.view = loginView;