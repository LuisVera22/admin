<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Personal</h4>
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
                        <div class="form-group">
                            <label for="filtroDni" class="form-label">Dni:</label>
                            <input type="number" class="form-control cajaNumerico" placeholder="N° Orden" data-index="1" id="filtroDni" pattern="[0-9]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="filtroPersonal" class="form-label">Nombre Personal:</label>
                            <input type="text" class="form-control" placeholder="Personal" data-index="3" id="filtroPersonal">
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
                <table id="tblListPersonal" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Personal</th>
                            <th>Rol</th>
                            <th>Tip. Doc.</th>
                            <th>N° Doc.</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form class="formularios" id="frmRegistrarPersonal" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro del Personal</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="selectTipoDocumento" class="form-label d-flex">Tipos de Documentos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="select2modal form-select" id="selectTipoDocumento" name="selectTipoDocumento" required>
                                            <option value="">[seleccione tipo de documento]</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label d-flex">Número Documento:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" class="form-control cajaNumerico" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textNombre" class="form-label d-flex">Nombres:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <input type="text" class="form-control" id="textNombre" name="textNombre" placeholder="Nombres del Personal" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textApellido" class="form-label d-flex">Apellidos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <input type="text" class="form-control" id="textApellido" name="textApellido" placeholder="Apellidos del Personal" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="textContacto" class="form-label">Contácto:</label>
                                        <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Teléfono/Celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label">Dirección:</label>
                                        <textarea class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="selectSede" class="form-label d-flex">Sedes/Lugares:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="select2modal form-select" id="selectSede" name="selectSede" required>
                                            <option value="">[seleccione sede/lugar]</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectRolPersonal" class="form-label d-flex">Rol Personal:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="select2modal form-select" id="selectRolPersonal" name="selectRolPersonal" required>
                                            <option value="">[seleccione rol personal]</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="textCorreo" class="form-label">Correo:</label>
                                        <input type="email" class="form-control" id="textCorreo" name="textCorreo" placeholder="Correo">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textUsuario" class="form-label">Usuario:</label>
                                            <input type="text" class="form-control" id="textUsuario" name="textUsuario" placeholder="Usuario">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textPassword" class="form-label">Password:</label>
                                            <input type="password" class="form-control" id="textPassword" name="textPassword" placeholder="Password" minlength="6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnPersonal">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarPersonal" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizarLabel">Actualizar Personal</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="param" id="param" required>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="selectTipoDocumento" class="form-label d-flex">Tipos de Documentos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <select class="form-select select2modalUdt" id="selectTipoDocumento" name="selectTipoDocumento" required>
                                                <option value="">[seleccione tipo de documento]</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="textNDocumento" class="form-label d-flex">Número Documento:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <input type="number" class="form-control cajaNumerico" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="textNombre" class="form-label d-flex">Nombres:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                                <input type="text" class="form-control" id="textNombre" name="textNombre" placeholder="Nombres del Personal" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="textApellido" class="form-label d-flex">Apellidos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                                <input type="text" class="form-control" id="textApellido" name="textApellido" placeholder="Apellidos del Personal" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textContacto" class="form-label">Contácto:</label>
                                            <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Teléfono/Celular">
                                        </div>
                                        <div class="form-group">
                                            <label for="textDireccion" class="form-label">Dirección:</label>
                                            <textarea class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="selectSede" class="form-label d-flex">Sedes/Lugares:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <select class="select2modalUdt form-select" id="selectSede" name="selectSede" required>
                                                <option value="">[seleccione sede/lugar]</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="selectRolPersonal" class="form-label d-flex">Rol Personal:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <select class="select2modalUdt form-select" id="selectRolPersonal" name="selectRolPersonal" required>
                                                <option value="">[seleccione rol personal]</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="textCorreo" class="form-label">Correo:</label>
                                            <input type="email" class="form-control" id="textCorreo" name="textCorreo" placeholder="Correo">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="textUsuario" class="form-label">Usuario:</label>
                                                <input type="text" class="form-control" id="textUsuario" name="textUsuario" placeholder="Usuario">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="textPassword" class="form-label">Password:</label>
                                                <input type="password" class="form-control" id="textPassword" name="textPassword" placeholder="Password" minlength="6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnPersonal">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="modal fade" id="info-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="infoLabel">Información del Personal</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectTipoDocumento" class="form-label d-flex">Tipo de Documento:</label>
                                            <p id="selectTipoDocumento"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textNDocumento" class="form-label d-flex">Número Documento:</label>
                                            <p id="textNDocumento"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textNombre" class="form-label d-flex">Nombres:</label>
                                            <p id="textNombre"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textApellido" class="form-label d-flex">Apellidos:</label>
                                            <p id="textApellido"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textDireccion" class="form-label">Dirección:</label>
                                            <p id="textDireccion"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textContacto" class="form-label">Contácto:</label>
                                            <p id="textContacto"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="selectSede" class="form-label d-flex">Sede/Lugar:</label>
                                        <p id="selectSede"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectRolPersonal" class="form-label d-flex">Rol Personal:</label>
                                        <p id="selectRolPersonal"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="textCorreo" class="form-label d-flex">Correo:</label>
                                        <p id="textCorreo"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="textUsuario" class="form-label">Usuario:</label>
                                            <p id="textUsuario"></p>
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
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="views/assets/js/select2/selectTipoDocumento.js"></script>
<script src="views/assets/js/select2/selectLocales.js"></script>
<script src="views/assets/js/select2/selectRoles.js"></script>

<script src="views/assets/js/src/model/personalModel.js"></script>
<script src="views/assets/js/src/controller/personalController.js"></script>
<script src="views/assets/js/src/view/personalView.js"></script>
<script src="views/assets/js/src/app/personalApp.js"></script>