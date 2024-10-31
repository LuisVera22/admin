<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Proveedores</h4>
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
                        <label id="filtroRuc" class="form-label">Ruc:</label>
                        <input type="number" class="form-control cajaNumerico" placeholder="N° Orden" data-index="1" id="filtroRuc" pattern="[0-9]">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="filtroProveedor" class="form-label">Nombre Proveedor:</label>
                            <input type="text" class="form-control" placeholder="Proveedor" data-index="3" id="filtroProveedor">
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
                <table id="tblListProveedor" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>RUC</th>
                            <th>Nombre Proveedor</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal AGREGAR PROVEEDOR-->
    <form class="formularios" id="frmRegistrarProveedor" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="agregarLabel">Registro Proveedor</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label d-flex">RUC:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" class="form-control cajaNumerico" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="textRazonSocial" class="form-label d-flex">Nombre Proveedor:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textRazonSocial" name="textRazonSocial" placeholder="Nombre Proveedor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label">Dirección:</label>
                                        <textarea class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textContacto" class="form-label">Contacto:</label>
                                    <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Contacto">
                                </div>
                                <div class="form-group">
                                    <label for="textNumeroCelular" class="form-label">Celular/telèfono:</label>
                                    <input type="text" class="form-control" id="textNumeroCelular" name="textNumeroCelular" placeholder="Celular/telèfono">
                                </div>
                                <div class="form-group">
                                    <label for="textCorreo" class="form-label">Correo:</label>
                                    <input type="email" class="form-control" id="textCorreo" name="textCorreo" placeholder="Correo">
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button id="btnProveedor" type="submit" class="btn btn-outline-success btn-sm">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height:1rem;display:none;">
                                </span>Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Actualizar Proveedores-->
    <form class="formularios" id="frmActualizarProveedor" method="post" autocomplete="off">
        <div class="modal fade" id="actualizar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h3 class="modal-title fs-4 text-center" id="actualizarLabel">Actualizar Proveedor</h3>
                        <hr class="my-3" style="border-top: 2px solid green;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" class="form-control" name="param" id="param" required>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label d-flex">RUC:<span class="text-danger ms-1" style="font-size: small;">(*)</span></label>
                                        <input type="text" class="form-control" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="textRazonSocial" class="form-label">Nombre Proveedor:</label>
                                        <input type="text" class="form-control" id="textRazonSocial" name="textRazonSocial" placeholder="Nombre Proveedor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label">Dirección:</label>
                                        <textarea class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textCorreo" class="form-label">Correo:</label>
                                    <input type="text" class="form-control" id="textCorreo" name="textCorreo" placeholder="Correo">
                                </div>
                                <div class="form-group">
                                    <label for="textNumeroCelular" class="form-label">Celular/teléfono:</label>
                                    <input type="text" class="form-control" id="textNumeroCelular" name="textNumeroCelular" placeholder="Celular/teléfono">
                                </div>
                                <div class="form-group">
                                    <label for="textContacto" class="form-label">Contácto:</label>
                                    <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Contácto">
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button id="btnProveedor" type="submit" class="btn btn-outline-info btn-sm">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height:1rem;display:none;">
                            </span>Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Info Proveedores-->
    <div>
        <div class="modal fade" id="info-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoLabel">Información del proveedor</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label d-flex">RUC:</label>
                                        <p id="textNDocumento"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="textRazonSocial" class="form-label d-flex">Nombre Proveedor:</label>
                                        <p id="textRazonSocial"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label d-flex">Dirección:</label>
                                        <p id="textDireccion"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="textNumeroCelular" class="form-label">Celular/teléfono:</label>
                                        <p id="textNumeroCelular"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="textContacto" class="form-label">Contácto:</label>
                                        <p id="textContacto"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="textCorreo" class="form-label">Correo:</label>
                                        <p id="textCorreo"></p>
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
<script src="views/assets/js/src/model/proveedorModel.js"></script>
<script src="views/assets/js/src/controller/proveedorController.js"></script>
<script src="views/assets/js/src/view/proveedorView.js"></script>
<script src="views/assets/js/src/app/proveedorApp.js"></script>