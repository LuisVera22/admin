const almacenproductofabricacionModel = new AlmacenproductofabricacionModel();
const almacenproductofabricacionController = new AlmacenproductofabricacionController(almacenproductofabricacionModel);
const almacenproductofabricacionView = new AlmacenproductofabricacionView(almacenproductofabricacionController);
selectManufactxProductoFabDig('frmRegistrarAlmacenProductosFabricacionDig',almacenproductofabricacionController);
selectManufactxProductoFabConv('frmRegistrarAlmacenProductosFabricacionConv',almacenproductofabricacionController);