<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Configuración de Servicios</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_servicios-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListServicio" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>DESCRIPCIÓN</th>
                            <th>PRECIO</th>
                            <th>TIENDA</th>
                            <th>SEDE</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form class="formularios" id="frmRegistrarServicios" method="post" autocomplete="off">
        <div class="modal fade" id="agregar_servicios-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_serviciosLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregar_serviciosLabel">Registro Servicios</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="textServicio" class="form-label d-flex">Servicio:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="text" class="form-control" id="textServicio" name="textServicio" placeholder="Servicio" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="textPrecio" class="form-label d-flex">Precio:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="number" min="0.0" step="any" class="form-control" id="textPrecio" name="textPrecio" placeholder="Precio" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectSede" class="form-label d-flex">Sedes/Lugares:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <select class="form-select select2modal" id="selectSede" name="selectSede" required>
                                        <option value="">[seleccione sede/lugar]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnServicios">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <form class="formularios" id="frmActualizarServicios" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar_servicios-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_serviciosLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_serviciosLabel">Registro Servicios</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" id="param" name="param" required>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="textServicio" class="form-label">Servicio:</label>
                                        <input type="text" class="form-control" id="textServicio" name="textServicio" placeholder="Servicio" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="textPrecio" class="form-label">Precio:</label>
                                        <input type="number" min="0.0" step="any" class="form-control" id="textPrecio" name="textPrecio" placeholder="Precio" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectSede" class="form-label d-flex">Sedes/Lugares:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="select2modalUdt form-select" id="selectSede" name="selectSede" required>
                                            <option value="">[seleccione sede/lugar]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnServicios">
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