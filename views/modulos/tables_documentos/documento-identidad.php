<section class="container-fluid py-4">
    <div class="pt-4 text-center">
        <h5 class="font-weight-bolder">Documento Identidad</h5>
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
                <table id="tblListTipoDocumento" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>DESCRIPCIÓN</th>
                            <th>CODIGO SUNAT</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <form class="formularios" id="frmRegistrarDocumentoIdentidad" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Documento Identidad</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="textDescripcion" class="form-label d-flex">Descripción:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textDescripcion" name="textDescripcion" placeholder="Descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="textCodigoSunat" class="form-label d-flex">Codigo Sunat:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textCodigoSunat" name="textCodigoSunat" placeholder="Código Sunat" required>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnDocumentoIdentidad">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
    <form class="formularios" id="frmActualizarDocumentoIdentidad" method="post" autocomplete="off">
        <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="actualizarLabel">Actualizar Documento Identidad</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" class="form-control" id="param" name="param" required>
                            <div class="col">
                                <div class="form-group">
                                    <label for="textDescripcion" class="form-label d-flex">Descripción:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textDescripcion" name="textDescripcion" placeholder="Descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="textCodigoSunat" class="form-label d-flex">Codigo Sunat:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textCodigoSunat" name="textCodigoSunat" placeholder="Código Sunat" required>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-info btn-sm" id="btnDocumentoIdentidad">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span> Actualizar</button>
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
<script src="views/assets/js/src/model/tipodocumentosModel.js"></script>
<script src="views/assets/js/src/controller/tipodocumentosController.js"></script>
<script src="views/assets/js/src/view/tipodocumentosView.js"></script>
<script src="views/assets/js/src/app/tipodocumentosApp.js"></script>