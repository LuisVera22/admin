<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Tipo Manufacturación</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_tipoMaufactura-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListTipomanufactura" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>DESCRIPCIÓN</th>
                            <th>ABREVIATURA</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div>
        <form class="formularios" id="frmRegistrarTipoManufactura" method="post" autocomplete="off">
            <div class="modal fade" id="agregar_tipoMaufactura-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_tipoMaufacturaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_tipoMaufacturaLabel">Registro Tipo Manufactura</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textDescripcion" class="form-label d-flex">Descripción:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textDescripcion" name="textDescripcion" placeholder="Descripción" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textAbrev" class="form-label d-flex">Abreviatura:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="text" class="form-control" id="textAbrev" name="textAbrev" placeholder="Abreviatura" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="selectTrabajo" class="form-label d-flex">Tipo de Trabajo:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select" id="selectTrabajo" name="selectTrabajo" required>
                                            <option value="">[seleccione trabajo]</option>
                                            <option value="Stck">Stock</option>
                                            <option value="Fab">Fab</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnTipoManufactura">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                </span> Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>