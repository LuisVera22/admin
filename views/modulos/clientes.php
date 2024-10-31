<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Clientes</h4>
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
                        <label id="filtroRuc" class="form-label">Ruc/Dni:</label>
                        <input type="number" class="form-control cajaNumerico" placeholder="N° Orden" data-index="1" id="filtroRuc" pattern="[0-9]">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="filtroCliente" class="form-label">Clientes:</label>
                            <input type="text" class="form-control" placeholder="Cliente" data-index="3" id="filtroCliente">
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
                <table id="tblListCliente" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Códido</th>
                            <th>Nombre Cliente</th>
                            <th>Tip. Doc.</th>
                            <th>Ruc/Dni</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form class="formularios" id="frmRegistrarCliente" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="selectTipoDocumento" class="form-label d-flex">Tipos de Documentos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectTipoDocumento" name="selectTipoDocumento" required>
                                            <option value="">[seleccione tipo de documento]</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label d-flex">Número Documento:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" class="form-control cajaNumerico" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="textNombre" class="form-label">Nombres:</label>
                                            <input type="text" class="form-control" id="textNombre" name="textNombre" placeholder="Nombres del Cliente">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="textApellido" class="form-label">Apellidos:</label>
                                            <input type="text" class="form-control" id="textApellido" name="textApellido" placeholder="Apellidos del Cliente">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="textRazonSocial" class="form-label">Razón Social:</label>
                                        <input type="text" class="form-control" id="textRazonSocial" name="textRazonSocial" placeholder="Razón Social">
                                    </div>
                                    <div class="form-group">
                                        <label for="textNombreComercial" class="form-label">Nombre Comercial:</label>
                                        <input type="text" class="form-control" id="textNombreComercial" name="textNombreComercial" placeholder="Nombre Comercial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="textCorreo" class="form-label">Correo:</label>
                                        <input type="email" class="form-control" id="textCorreo" name="textCorreo" placeholder="correo">
                                    </div>
                                    <div class="form-group">
                                        <label for="textContacto" class="form-label">Contácto:</label>
                                        <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Teléfono/Celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label">Dirección:</label>
                                        <textarea type="text" class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccionFiscal" class="form-label">Dirección Fiscal:</label>
                                        <textarea type="text" class="form-control" id="textDireccionFiscal" name="textDireccionFiscal" placeholder="Dirección Fiscal"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm btnCliente">
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
        <form class="formularios" id="frmActualizarCliente" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
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
                                <input class="form-control" type="hidden" name="param" id="param">
                                <div class="col-md-6">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="textNombre" class="form-label">Nombres:</label>
                                                <input type="text" class="form-control" id="textNombre" name="textNombre" placeholder="Nombres del Cliente">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="textApellido" class="form-label">Apellidos:</label>
                                                <input type="text" class="form-control" id="textApellido" name="textApellido" placeholder="Apellidos del Cliente">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textRazonSocial" class="form-label">Razón Social:</label>
                                            <input type="text" class="form-control" id="textRazonSocial" name="textRazonSocial" placeholder="Razón Social">
                                        </div>
                                        <div class="form-group">
                                            <label for="textNombreComercial" class="form-label">Nombre Comercial:</label>
                                            <input type="text" class="form-control" id="textNombreComercial" name="textNombreComercial" placeholder="Nombre Comercial">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="textCorreo" class="form-label">Correo:</label>
                                            <input type="email" class="form-control" id="textCorreo" name="textCorreo" placeholder="correo">
                                        </div>
                                        <div class="form-group">
                                            <label for="textContacto" class="form-label">Contácto:</label>
                                            <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Teléfono/Celular">
                                        </div>
                                        <div class="form-group">
                                            <label for="textDireccion" class="form-label">Dirección:</label>
                                            <textarea type="text" class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="textDireccionFiscal" class="form-label">Dirección Fiscal:</label>
                                            <textarea type="text" class="form-control" id="textDireccionFiscal" name="textDireccionFiscal" placeholder="Dirección Fiscal"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm btnCliente">
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
                                    <div>
                                        <div class="form-group">
                                            <label for="selectTipoDocumento" class="form-label d-flex">Tipo de Documento:</label>
                                            <p id="selectTipoDocumento"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textNDocumento" class="form-label d-flex">Número Documento:</label>
                                            <p id="textNDocumento"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textPersonal" class="form-label">Cliente:</label>
                                            <p id="textPersonal"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textNombreComercial" class="form-label">Nombre Comercial:</label>
                                            <p id="textNombreComercial"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div>
                                        <div class="form-group">
                                            <label for="textCorreo" class="form-label">Correo:</label>
                                            <p id="textCorreo"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textContacto" class="form-label">Contácto:</label>
                                            <p id="textContacto"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textDireccion" class="form-label">Dirección:</label>
                                            <p id="textDireccion"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="textDireccionFiscal" class="form-label">Dirección Fiscal:</label>
                                            <p id="textDireccionFiscal"></p>
                                        </div>
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

<script src="views/assets/js/select2/selectTipoDocumento.js"></script>

<script src="views/assets/js/src/model/clienteModel.js"></script>
<script src="views/assets/js/src/controller/clienteController.js"></script>
<script src="views/assets/js/src/view/clienteView.js"></script>
<script src="views/assets/js/src/app/clienteApp.js"></script>