<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Productos - Stock</h4>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline collapsed-card mb-5" style="overflow: hidden;">
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
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListAlmacenProductosStock" class="table table-flush table-hover" width="100%">
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
    <div>
        <!-- Modal -->
        <form class="formularios" id="frmRegistrarAlmacenProductosStock" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Productos Stock</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <select class="form-select" id="selectTrabajo" name="selectTrabajo" required disabled>
                                    <option value="Stck" selected>Stock</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectManufactura" class="form-label d-flex">Tipo de Manufacturación Stock:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select" id="selectManufactura" name="selectManufactura" required disabled>
                                    <option value="">[seleccione tipo de Manufacturación]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectProductos" class="form-label d-flex">Producto:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectProductos" name="selectProductos" required>
                                    <option value="">[seleccione producto]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectTipoCombinacion" class="form-label d-flex">Tipos de Medidas:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                <select class="form-select select2modal" id="selectTipoCombinacion" name="selectTipoCombinacion" required>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnAlmacenProductStock">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                Guardar</button>
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
<script src="views/assets/js/select2/selectAlmacenProductoStock.js"></script>

<script src="views/assets/js/src/model/almacenproductostockModel.js"></script>
<script src="views/assets/js/src/controller/almacenproductostockController.js"></script>
<script src="views/assets/js/src/view/almacenproductostockView.js"></script>
<script src="views/assets/js/src/app/almacenproductostockApp.js"></script>