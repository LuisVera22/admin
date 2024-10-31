<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Reposición - Stock</h4>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> REPONER STOCK
                </button>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <div class="card card-primary card-outline collapsed-card" style="overflow: hidden;">
            <div class="card-header">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-tool mb-0" data-bs-toggle="collapse" data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro" style="display: flex;width: 100%;    padding: 0.75rem 1.25rem;">
                        <div class="me-2"><i class="fas fa-filter"></i></div>
                        <div style="width: 100%;text-align:left;">Filtro Stock</div>
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
                                <input type="text" class="form-control" placeholder="Producto stock" data-index="1" id="filtroProductoFreForm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblReposicionStock" class="table table-flush table-hover" width='100%'>
                    <thead class="thead-light">
                        <tr>
                            <th>CÓDIGO PRODC. EN ALMACÉN</th>
                            <th>O. T. ANEXADO</th>
                            <th>MOTIVO</th>
                            <th>MONTO REPUESTO</th>
                            <th>LOCAL</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form class="formularios" id="frmRegistrarReposicionStock" action="" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Productos</h1>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="selectCodigoProducto" class="form-label d-flex">Código producto almacén:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <select class="form-select select2modal" id="selectCodigoProducto" name="selectCodigoProducto" required>
                                        <option value="">[seleccione código producto]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="textCodigoOrden" class="form-label d-flex">Código de la ordén de trabajo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" placeholder="Digitar código de la ordén de trabajo" name="textCodigoOrden" id="textCodigoOrden" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textCantidad" class="form-label d-flex">Cantidad a reponer:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                            <input type="number" min="0" class="form-control" placeholder="Escribir la cantidad a reponer" name="textCantidad" id="textCantidad" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="textMotivo" class="form-label">Motivo de la reposición:</label>
                            <textarea class="form-control" id="textMotivo" name="textMotivo" placeholder="Escribir el motivo de la reposición"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnReposicion">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="info-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-uppercase fs-5" id="infoLabel">Información de la Reposición</h1>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header pb-0 p-3 text-uppercase">
                                    Detalle de la Reposición
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <strong>Motivo de reposición:</strong>
                                            <p id="textMotivo"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Tiempo de la reposición:</strong>
                                            <p id="textTiempo"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Monto de reposición:</strong>
                                            <p id="textMonto"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header pb-0 p-3 text-uppercase">
                                    Detalle del producto a reponer
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <strong>Código de producto:</strong>
                                        <p id="textCodidoProducto"></p>
                                    </div>
                                    <div class="col-12">
                                        <strong>Producto:</strong>
                                        <p id="textProducto"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header pb-0 p-3 text-uppercase">
                                    Detalle de la orden de trabajo
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <strong>Código de orden:</strong>
                                            <p id="textCodigoOrden"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Cliente:</strong>
                                            <p id="textCliente"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Sede:</strong>
                                            <p id="textSede"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Tipo de Manufacturación:</strong>
                                            <p id="textTipoManufacturacion"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Detalle de Trabajo:</strong>
                                            <p id="textDetalle"></p>
                                        </div>
                                        <div class="col-12">
                                            <strong>Vendedor:</strong>
                                            <p id="textVendedor"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectReposicionStock.js"></script>

<script src="views/assets/js/src/model/reposicionstockModel.js"></script>
<script src="views/assets/js/src/controller/reposicionstockController.js"></script>
<script src="views/assets/js/src/view/reposicionstockView.js"></script>
<script src="views/assets/js/src/app/reposicionstockApp.js"></script>