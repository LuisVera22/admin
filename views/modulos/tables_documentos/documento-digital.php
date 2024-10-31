<section class="container-fluid py-4">
    <div class="pt-4 text-center">
        <h5 class="font-weight-bolder">Documento Digitales</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-ventas-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListDocumentoVenta" class="table table-flush table-hover" width="100%">
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
    <form class="formularios" id="frmRegistrarDocumentoVenta" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-ventas-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Documento Sunat</h1>
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
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnDocumentoSunat">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarDocumentoVenta" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-venta-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizarLabel">Actualizar Documento Venta</h1>
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
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnDocumentoVenta">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span> Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="views/assets/js/src/model/documentoventasModel.js"></script>
<script src="views/assets/js/src/controller/documentoventasController.js"></script>
<script src="views/assets/js/src/view/documentoventasView.js"></script>
<script src="views/assets/js/src/app/documentoventasApp.js"></script>