const cambiarPasswordModel = new CambiarpasswordModel();
const cambiarPasswordController = new CambiarpasswordController(cambiarPasswordModel,null);
const cambiarPasswordView = new CambiarpasswordView(cambiarPasswordController);
cambiarPasswordController.view = cambiarPasswordView;
