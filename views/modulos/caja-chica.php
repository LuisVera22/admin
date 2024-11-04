<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Caja Chica</h4>
    </div>
    <div class="card card-primary card-outline collapse-card" style="overflow: hidden;">
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
                <div class="row">
                    <div class="col-sm-6">
                        <label id="#" class="form-label">#:</label>
                        <input type="number" class="form-control cajaNumerico" placeholder="#" data-index="1" id="#" pattern="#">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="#" class="form-label">#:</label>
                            <input type="text" class="form-control" placeholder="#" data-index="3" id="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListCajachica" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Descripción</th>
                            <th>Monto</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form class="formularios" id="frmRegistrarCajachica" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Caja Chica</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="textDescription" class="form-label">Descripción:</label>
                                            <textarea name="textDescription" id="textDescription" class="form-control" placeholder="Motivo del retiro de dinero" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Monto:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Ingrese el monto retirado" step="any" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="imgCajachica" class="form-label">Subir imagen:</label>
                                    <input type="file" class="form-control" id="imgCajachica" name="imgCajachica" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm btnCajachica">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarCajachica" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Actualizar Caja Chica</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input class="form-control" type="hidden" name="param" id="param">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="textDescription" class="form-label">Descripción:</label>
                                                <textarea name="textDescription" id="textDescription" class="form-control" placeholder="Motivo del retiro de dinero" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="amount" class="form-label">Monto:</label>
                                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Ingrese el monto retirado" step="any" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="imgCajachica" class="form-label">Subir imagen:</label>
                                        <input type="file" class="form-control" id="imgCajachica" name="imgCajachica" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm btnCajachica">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="modal fade" id="info-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Cliente</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">Fecha:</label>
                                        <p id="textFecha"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Hora:</label>
                                        <p id="textHora"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Usuario:</label>
                                        <p id="textUsuario"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">Monto:</label>
                                        <p id="textMonto"></p>
                                    </di>
                                    <div class="form-group">
                                        <label class="form-label">Descripción:</label>
                                        <p id="textDescripcion"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">Imagen:</label>
                                        <img id="imgCajachica" src="" alt="Imagen de Caja Chica" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="views/assets/js/src/model/cajachicaModel.js"></script>
<script src="views/assets/js/src/controller/cajachicaController.js"></script>
<script src="views/assets/js/src/view/cajachicaView.js"></script>
<script src="views/assets/js/src/app/cajachicaApp.js"></script>