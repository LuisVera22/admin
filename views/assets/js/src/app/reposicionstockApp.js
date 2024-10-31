const reposicionstockModel = new ReposicionStockModel();
const reposicionstockController = new ReposicionStockController(reposicionstockModel);
const reposicionstockView = new ReposicionStockView(reposicionstockController);
selectManufactxAlmacenStock('frmRegistrarReposicionStock',reposicionstockController);