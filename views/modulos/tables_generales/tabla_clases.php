<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Configuración de Clases</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_clase-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListClases" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>MATERIALES</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ABREVIACIÓN </th>                            
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div>
        <!-- Modal Registro Clase -->
        <form class="formularios" id="frmRegistrarClase" action="" method="post" autocomplete="off">
            <div class="modal fade" id="agregar_clase-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_claseLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_claseLabel">Registro Clase</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textClase" class="form-label d-flex">Nombre de la Clase:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textClase" name="textClase" placeholder="Nombre de la Clase" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevClase" class="form-label d-flex">Abreviatura de la Clase:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevClase" name="textAbrevClase" placeholder="Abreviatura de la Clase" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectMateriales" class="form-label">Materiales:</label>
                                        <select class="form-select select2modal" id="selectMateriales" name="selectMateriales">
                                            <option value="">[seleccione material]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnClases">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div>
        <!-- Modal Actualización de Clase -->
        <form class="formularios" id="frmActualizarClase" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar_clase-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizar_claseLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizar_claseLabel">Actualizar Clase</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="param" name="param">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textClase" class="form-label d-flex">Nombre de la Clase:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textClase" name="textClase" placeholder="Nombre de la Clase" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrevClase" class="form-label d-flex">Abreviatura de la Clase:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrevClase" name="textAbrevClase" placeholder="Abreviatura de la Clase" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectMateriales" class="form-label d-flex">Materiales:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modalUdt" id="selectMateriales" name="selectMateriales" required>
                                            <option value="">[seleccione material]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnClases">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span>Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>