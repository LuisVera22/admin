class TipoDocumentosModel {
  constructor() {
    this.param = ""; // Agrega otros campos necesarios
  }

  setParam(param) {
    this.param = param;
  }

  getFormData(crud) {
    return {
      param: this.param,
      crud: crud,
    };
  }
}