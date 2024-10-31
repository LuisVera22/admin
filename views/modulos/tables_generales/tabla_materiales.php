<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Configuración de Materiales</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_material-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListMateriales" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>TIPO SUBTIPO</th>
                            <th>DESCRTIPCIÓN</th>
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
        <form class="formularios" id="frmRegistrarMateriales" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar_material-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_materialLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_materialLabel">Registro Materiales</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textMaterial" class="form-label d-flex">Material:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textMaterial" name="textMaterial" placeholder="Material" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevMaterial" class="form-label d-flex">Abrev. de Material:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevMaterial" name="textAbrevMaterial" placeholder="Abrev. de Material" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipos" class="form-label d-flex">Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectTipos" name="selectTipos" required>
                                            <option value="">[seleccione tipo]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="show_subtipo" style="display: none;">
                                    <div class="form-group">
                                        <label for="selectSubTipos" class="form-label d-flex">Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectSubTipos" name="selectSubTipos">
                                            <option value="">[seleccione sub tipo]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnMateriales">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <!-- Modal de Actualización de Materiales -->
        <form class="formularios" id="frmActualizarMateriales" id="frmActualizarMaterial" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar_material-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizar_materialLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizar_materialLabel">Actualizar Material</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="param" name="param">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textMaterialActualizar" class="form-label d-flex">Material:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textMaterial" name="textMaterial" placeholder="Material" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevMaterial" class="form-label d-flex">Abrev. de Material:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevMaterial" name="textAbrevMaterial" placeholder="Abrev. de Material" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipos" class="form-label d-flex">Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modalUdt" id="selectTipos" name="selectTipos" required>
                                            <option value="">[seleccione tipo]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="show_subtipo" style="display: none;">
                                    <div class="form-group">
                                        <label for="selectSubTipos" class="form-label d-flex">Sub Tipo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modalUdt" id="selectSubTipos" name="selectSubTipos">
                                            <option value="">[seleccione sub tipo]</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnMateriales">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>