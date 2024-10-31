<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Órdenes de Trabajo</h4>
    </div>

    <div class="card card-primary card-outline collapsed-card" style="overflow: hidden;">
        <div class="card-header">
            <h5 class="mb-0">
                <button type="button" class="btn btn-tool mb-0" data-bs-toggle="collapse" data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro" style="display: flex;width: 100%;    padding: 0.75rem 1.25rem;">
                    <div class="me-2"><i class="fas fa-filter"></i></div>
                    <div style="width: 100%;text-align:left;">Filtrar</div>
                    <div id="iconContainer"><i class="fas fa-plus"></i></div>
                </button>
            </h5>
        </div>
        <div class="collapse" id="collapseFiltro">
            <div class="card-body">
                <form id="frmFilterOrdenes" method="post">
                    <div class="text-end p-2" id="aviso_fecha" hidden>
                        <p class="text-danger mb-0">*se deben asignar alguna fecha para realizar busqueda</p>
                    </div>
                    <div class="d-flex">
                        <div class="ms-auto d-flex">
                            <div class="ps-4">
                                <div class="form-group">
                                    <label for="textInicio" class="form-label">Fecha Inicio:</label>
                                    <div class="input-group date textInicio">
                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textInicio">
                                        <span class="input-group-addon">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-4">
                                <div class="form-group">
                                    <label for="textFin" class="form-label">Fecha Fin:</label>
                                    <div class="input-group date textFin">
                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textFin">
                                        <span class="input-group-addon">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-4 m-auto pt-3">
                                <button type="button" class="btn btn-outline-info text-info mb-0 p-2" id="btn_search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div class="ps-2 m-auto pt-3">
                                <button type="button" class="btn btn-outline-dark text-dark mb-0 p-2" id="btn_eraser">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-dark border-bottom" />
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="filtroOrden" class="form-label">Código:</label>
                                <input type="text" class="form-control" placeholder="Código" data-index="3" id="filtroOrden">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="filterCliente" class="form-label">Cliente:</label>
                                <!-- <input type="text" class="form-control" placeholder="Cliente" data-index="3" id="filtroCliente"> -->
                                <select class="form-select select2Busqueda" id="filterCliente" data-index="4">
                                    <option value="">[seleccione mensajero]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="filterMensajero" class="form-label">Mensajeros:</label>
                                <select class="form-select select2Busqueda" id="filterMensajero" data-index="7">
                                    <option value="">[seleccione mensajero]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="filterVendedor" class="form-label">Vendedores:</label>
                                <select class="form-select select2Busqueda" id="filterVendedor" data-index="6">
                                    <option value="">[seleccione vendedor]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4" id="filtro_sede">
                            <div class="form-group">
                                <label for="filterSede" class="form-label">Sede:</label>
                                <select class="form-select select2Busqueda" id="filterSede" data-index="8">
                                    <option value="">[seleccione sede]</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-primary text-primary" id="btn_venta_electronica">
                    <i class="fas fa-cart-plus me-2"></i> convertir venta
                </button>
            </div>
            <div class="ps-4">
                <a href="nueva-orden-trabajo" class="btn btn-outline-info">
                    <i class="fa fa-plus me-2"></i> nuevo trabajo
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex m-3">
        <div class="d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-warning text-dark" id="btn_enviar_almacen">
                    <i class="fas fa-share"></i> Enviar a Mi Almacén
                </button>
            </div>
            <div class="ps-4">
                <button type="button" class="btn btn-outline-success text-dark" id="btn_enviar_rbc">
                    <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                    </span>
                    <i class="fas fa-paper-plane" id="fa_icon"></i> Enviar a LimaRBC1
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="container table-responsive px-2">
                <table id="tblListOrdenTrabajo" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>
                                <div class="text-center">
                                    #
                                </div>
                            </th>
                            <th class="text-center">Ticket</th>
                            <th>Fecha</th>
                            <th>Código</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Producto</th>
                            <th>Vendedor</th>
                            <th>Mensajero</th>
                            <th>Sede</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Mi Almacén</th>
                            <th class="text-center">LimaRBC1</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="print-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="printLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-uppercase fs-5" id="printLabel">Registro Cliente</h1>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-outline-primary btn-sm btnCerrar">Imprimir</button>
                        </div>
                        <div class="col-12">
                            <embed src="views/src/desingpdf/desing.pdf" type="application/pdf" width="100%" height="600px" toolbar="0" />
                            <!-- <iframe src="views/src/desingpdf/desing.pdf" width="100%" height="600px" toolbar="0" ></iframe> -->

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-success btn-sm">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para actualizar -->
    <form id="frmEnviarMotivo" method="post">
        <div class="modal fade" id="actualizar-modal" tabindex="-1" aria-labelledby="actualizar-modalModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="actualizar-modalModalLabel">Actualizar Orden de Trabajo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <div class="card-body" style="color: #0d6efd;">
                                    <p class="card-text">Cuál es el motio para actualizar la orden de trabajo?.</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="motivo-text" class="col-form-label">Motivo:</label>
                                <textarea class="form-control" name="motivo-text" id="motivo-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-outline-primary btn-sm" id="btnMotivo">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                            Enviando motivo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="loading" style="display: none;">
        <div class="loading-overlay"></div>
        <div class="loading-image">
            <img src="views/assets/img/loading.gif" width="100%" alt="Cargando...">
        </div>
    </div>
</section>

<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectCliente.js"></script>
<script src="views/assets/js/select2/selectMensajero.js"></script>
<script src="views/assets/js/select2/selectVendedor.js"></script>
<script src="views/assets/js/select2/selectSedes.js"></script>

<script src="views/assets/js/src/model/cotizacionModel.js"></script>
<script src="views/assets/js/src/controller/cotizacionController.js"></script>
<script src="views/assets/js/src/view/cotizacionView.js"></script>
<script src="views/assets/js/src/app/cotizacionApp.js"></script>