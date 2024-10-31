class AlmacenFabricacionView {
    constructor(controller) {
        this.controller = controller;
        this.formCargarDigitalExcel = $('#frmRegistrarAlmacenFabricacionDig');
        this.formCargarConvencionalExcel = $('#frmRegistrarAlmacenFabricacionConv');

        this.formCargarDigitalExcel.submit((e) => {
            e.preventDefault();
            this.controller.onChargeAlmacenDigitalCantidad(e);
        });

        this.formCargarConvencionalExcel.submit((e) => {
            e.preventDefault();
            this.controller.onChargeAlmacenConvencionalCantidad(e);
        });

        this.onclicExcelDigital();
        this.onclicExcelConvencional();
    }

    onclicExcelDigital() {
        this.controller.exportarExcelDigital();
    }
    onclicExcelConvencional() {
        this.controller.exportarExcelConvencional();
    }
}