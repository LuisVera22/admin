<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Productos - Fabricación</h4>
    </div>
    <div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="listFform-tab" data-bs-toggle="tab" data-bs-target="#listFform-tab-pane" type="button" role="tab" aria-controls="listFform-tab-pane" aria-selected="false">Listado Fabricación</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="listConv-tab" data-bs-toggle="tab" data-bs-target="#listConv-tab-pane" type="button" role="tab" aria-controls="listConv-tab-pane" aria-selected="false">Listado Convencional</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listFform-tab-pane" role="tabpanel" aria-labelledby="listFform-tab" tabindex="0">
                <div class="d-flex m-3">
                    <div class="ms-auto d-flex">
                        <div class="ps-4">
                            <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-modal-Digital">
                                <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-5">
                        <div class="card card-primary card-outline collapsed-card" style="overflow: hidden;">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-tool mb-0" data-bs-toggle="collapse" data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro" style="display: flex;width: 100%;    padding: 0.75rem 1.25rem;">
                                        <div class="me-2"><i class="fas fa-filter"></i></div>
                                        <div style="width: 100%;text-align:left;">Filtro Free Form</div>
                                        <div id="iconContainer"><i class="fas fa-plus"></i></div>
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseFiltro">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="filtroCódigoFreForm" class="form-label">Código:</label>
                                                <input type="text" class="form-control" placeholder="Código" data-index="0" id="filtroCódigoFreForm">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="filtroProductoFreForm" class="form-label">Producto:</label>
                                                <input type="text" class="form-control" placeholder="Producto Free Form" data-index="1" id="filtroProductoFreForm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tblListAlmacenProductosDigital" class="table table-flush table-hover" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>CÓDIGO</th>
                                                <th>PRODUCTO EN ALMACÉN</th>
                                                <th class="text-center">ESTADO</th>
                                                <th class="text-center">ACCIONES</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="listConv-tab-pane" role="tabpanel" aria-labelledby="listConv-tab" tabindex="0">
                <div class="d-flex m-3">
                    <div class="ms-auto d-flex">
                        <div class="ps-4">
                            <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-modal-Convencional">
                                <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-5">
                        <div class="card card-primary card-outline collapsed-card" style="overflow: hidden;">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-tool mb-0" data-bs-toggle="collapse" data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro" style="display: flex;width: 100%;    padding: 0.75rem 1.25rem;">
                                        <div class="me-2"><i class="fas fa-filter"></i></div>
                                        <div style="width: 100%;text-align:left;">Filtro Convencional</div>
                                        <div id="iconContainer"><i class="fas fa-plus"></i></div>
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseFiltro">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="filtroCódigoConv" class="form-label">Código:</label>
                                                <input type="text" class="form-control" placeholder="Código" data-index="0" id="filtroCódigoConv">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="filtroProductoConv" class="form-label">Producto:</label>
                                                <input type="text" class="form-control" placeholder="Producto Free Form" data-index="1" id="filtroProductoConv">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tblListAlmacenProductosConvencional" class="table table-flush table-hover" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>CÓDIGO</th>
                                                <th>PRODUCTO EN ALMACÉN</th>
                                                <th class="text-center">ESTADO</th>
                                                <th class="text-center">ACCIONES</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div>
        <!-- Modal -->
        <form class="formularios" id="frmRegistrarAlmacenProductosFabricacionDig" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar-modal-Digital" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Productos Digital</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <select class="form-select" id="selectTrabajo" name="selectTrabajo" required disabled>
                                    <option value="Fab" selected>Fab</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectManufacturaDig" class="form-label d-flex">Tipo de Manufacturación Fabricación:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select" id="selectManufacturaDig" name="selectManufacturaDig" disabled required>
                                    <option value="">[seleccione tipo de fabricación]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectProductosDig" class="form-label d-flex">Producto:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectProductosDig" name="selectProductosDig" required>
                                    <option value="">[seleccione producto]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectTipoCombinacionDig" class="form-label d-flex">Tipos de Medidas:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectTipoCombinacionDig" name="selectTipoCombinacionDig" required>
                                    <option value="">[seleccione medida]</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textBase" class="form-label d-flex">Base:</label>
                                        <input type="text" class="form-control" id="textBase" name="textBase" placeholder="Base">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textDiametro" class="form-label d-flex">Diametro:</label>
                                        <input type="text" class="form-control" id="textDiametro" name="textDiametro" placeholder="Diametro">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-outline-success btn-sm" id="btnAlmacenProductFabricacion">
                                    <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                    Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="formularios" id="frmRegistrarAlmacenProductosFabricacionConv" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar-modal-Convencional" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Productos Convencionales</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <select class="form-select" id="selectTrabajo" name="selectTrabajo" required disabled>
                                    <option value="Fab" selected>Fab</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectManufacturaConv" class="form-label d-flex">Tipo de Manufacturación Fabricación:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select" id="selectManufacturaConv" name="selectManufacturaConv" disabled required>
                                    <option value="">[seleccione tipo de fabricación]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectProductosConv" class="form-label d-flex">Producto:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectProductosConv" name="selectProductosConv" required>
                                    <option value="">[seleccione producto]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectTipoCombinacionConv" class="form-label d-flex">Tipos de Medidas:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectTipoCombinacionConv" name="selectTipoCombinacionConv" required>
                                    <option value="">[seleccione medida]</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textBase" class="form-label d-flex">Base:</label>
                                        <input type="text" class="form-control" id="textBase" name="textBase" placeholder="Base">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textDiametro" class="form-label d-flex">Diametro:</label>
                                        <input type="text" class="form-control" id="textDiametro" name="textDiametro" placeholder="Diametro">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-outline-success btn-sm" id="btnAlmacenProductFabricacion">
                                    <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                    Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectCombinacion.js"></script>
<script src="views/assets/js/select2/selectAlmacenProductoFabricacion.js"></script>

<script src="views/assets/js/src/model/almacenproductofabricacionModel.js"></script>
<script src="views/assets/js/src/controller/almacenproductofabricacionController.js"></script>
<script src="views/assets/js/src/view/almacenproductofabricacionView.js"></script>
<script src="views/assets/js/src/app/almacenproductofabricacionApp.js"></script>