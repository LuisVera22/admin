const personalModel = new PersonalModel();
const personalController = new PersonalController(personalModel,null);
const personalView = new PersonalView(personalController);
personalController.view = personalView;
personalController.view = personalView;