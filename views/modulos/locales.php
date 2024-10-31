<section class="container-fluid py-4">
    <div class="d-flex">
        <div>
            <a href="empresa" class="btn bg-gradient-info btn-icon-only mb-0 mt-3">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
        <div class="ms-3">
            <h4>Información de tiendas o surcursales</h4>
            <p>Configure los datos de las tiendas y sus series digitales.</p>
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
                <table id="tblListLocales" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>SEDE</th>
                            <th>DIRECCIÓN</th>
                            <th class="text-center">SERIES</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form class="formularios" id="frmRegistrarLocal" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro local</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input class="form-control" type="hidden" name="param" id="param" value="<?php echo $_POST['paramLocal'] ?>">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="selectSede" class="form-label d-flex">Sede:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <select class="select2modal form-select" id="selectSede" name="selectSede" required>
                                        <option value="">[seleccione sede]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call1" class="form-label">Teléfono 1:</label>
                                    <input type="text" class="form-control" id="call1" name="call1" placeholder="Teléfono 1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call2" class="form-label">Teléfono 2:</label>
                                    <input type="text" class="form-control" id="call2" name="call2" placeholder="Teléfono 2">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call3" class="form-label">Teléfono 3:</label>
                                    <input type="text" class="form-control" id="call3" name="call3" placeholder="Teléfono 3">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check align-content-center">
                                    <input class="form-check-input" type="checkbox" id="CheckLocalPrincipal" name="CheckLocalPrincipal">
                                    <label class="form-check-label" for="CheckLocalPrincipal">
                                        Local Principal
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address" class="form-label d-flex">Dirección:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Dirección" required></textarea>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnLocales">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarLocal" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizarLabel">Actualizar local</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input class="form-control" type="hidden" name="param" id="param">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="selectSede" class="form-label d-flex">Sede:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="select2modalUdt form-select" id="selectSede" name="selectSede" required>
                                            <option value="">[seleccione sede]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="call1" class="form-label">Teléfono 1:</label>
                                        <input type="text" class="form-control" id="call1" name="call1" placeholder="Teléfono 1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="call2" class="form-label">Teléfono 2:</label>
                                        <input type="text" class="form-control" id="call2" name="call2" placeholder="Teléfono 2">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="call3" class="form-label">Teléfono 3:</label>
                                        <input type="text" class="form-control" id="call3" name="call3" placeholder="Teléfono 3">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check align-content-center">
                                        <input class="form-check-input" type="checkbox" id="CheckLocalPrincipal2" name="CheckLocalPrincipal2">
                                        <label class="form-check-label" for="CheckLocalPrincipal2">
                                            Local Principal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label d-flex">Dirección:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Dirección" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnLocales">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="modal fade" id="info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="infoLabel">Info Local</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sede" class="form-label d-flex">Sede:</label>
                                    <p id="sede"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address" class="form-label d-flex">Dirección:</label>
                                    <p id="address"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call1" class="form-label">Teléfono 1:</label>
                                    <p id="call1"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call2" class="form-label">Teléfono 2:</label>
                                    <p id="call2"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="call3" class="form-label">Teléfono 3:</label>
                                    <p id="call3"></p>
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
<?php require 'correlativo-local.php' ?>