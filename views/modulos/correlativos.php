<section class="container-fluid py-4">
    <div class="row">
        <div class="d-flex">
            <div>
                <a href="empresa" class="btn bg-gradient-info btn-icon-only mb-0 mt-3">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="ms-3">
                <h4>Configuración de correlativos</h4>
                <p>Configure los documentos de ventas y sus series para ser usada en las tiendas o sucursales.</p>
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
                <table id="tblListCorrelativo" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Doc. venta</th>
                            <th>serie</th>
                            <th>Correlativo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form class="formularios" id="frmRegistrarCorrelativo" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">NUEVO CORRELATIVO</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="selectDocumentoventa" class="form-label d-flex">Documeno Venta:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <select class="form-select select2modal" id="selectDocumentoventa" name="selectDocumentoventa" required>
                                        <option value="">[seleccione documento venta]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="textSerie" class="form-label d-flex">Serie:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textSerie" name="textSerie" placeholder="Serie" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="textCorrelativo" class="form-label d-flex">Correlativo Inicial:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="number" class="form-control cajaNumerico" id="textCorrelativo" name="textCorrelativo" placeholder="Correlativo Inicial" required>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnCorrelativo">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarCorrelativo" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizarLabel">ACTUALIZAR CORRELATIVO</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <input type="hidden" class="form-control" id="param" name="param" required>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="selectDocumentoventa" class="form-label d-flex">Documeno Venta:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modalUdt" id="selectDocumentoventa" name="selectDocumentoventa" required>
                                            <option value="">[seleccione documento venta]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textSerie" class="form-label d-flex">Serie:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textSerie" name="textSerie" placeholder="Serie" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textCorrelativo" class="form-label d-flex">Correlativo Inicial:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" class="form-control cajaNumerico" id="textCorrelativo" name="textCorrelativo" placeholder="Correlativo Inicial" required>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnCorrelativo">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                Actualizar
                            </button>
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

<script src="views/assets/js/select2/selectDocumentoVentas.js"></script>
<script src="views/assets/js/src/model/correlativoModel.js"></script>
<script src="views/assets/js/src/controller/correlativoController.js"></script>
<script src="views/assets/js/src/view/correlativoView.js"></script>
<script src="views/assets/js/src/app/correlativoApp.js"></script>