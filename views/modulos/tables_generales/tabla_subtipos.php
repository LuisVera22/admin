<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Configuración de Sub Tipos</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_subtipo-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListSubTipos" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>TIPO</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ABREVIACIÓN</th>
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
        <form class="formularios" id="frmRegistrarSubTipos" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar_subtipo-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_subtipoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_subtipoLabel">Registro Sub Tipos</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textSubTipo" class="form-label d-flex">Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textSubTipo" name="textSubTipo" placeholder="Sub Tipo" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevSubTipo" class="form-label d-flex">Abrev. de Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevSubTipo" name="textAbrevSubTipo" placeholder="Abrev. de Sub Tipo" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipos" class="form-label d-flex">Tipos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectTipos" name="selectTipos" required>
                                            <option value="">[seleccione tipo]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnSubTipo">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <!-- Modal de Actualización de Sub Tipos -->
        <form class="formularios" id="frmActualizarSubTipos" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar_subtipo-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizar_subtipoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizar_subtipoLabel">Actualizar Sub Tipo</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="param" name="param">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textSubTipo" class="form-label d-flex">Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textSubTipo" name="textSubTipo" placeholder="Sub Tipo" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevSubTipo" class="form-label d-flex">Abrev. de Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevSubTipo" name="textAbrevSubTipo" placeholder="Abrev. de Sub Tipo" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipos" class="form-label d-flex">Tipos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modalUdt" id="selectTipos" name="selectTipos" required>
                                            <option value="">[seleccione tipo]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnSubTipo">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>