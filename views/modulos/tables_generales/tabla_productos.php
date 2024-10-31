<section class="container-fluid">
    <div class="text-center">
        <h5 class="font-weight-bolder">Configuración de Productos</h5>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar_productos-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR NUEVO
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListProducto" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>DESCRIPCIÓN</th>
                            <th>PRECIO</th>                            
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
        <form class="formularios" id="frmRegistrarProductos" method="post" autocomplete="off">
            <div class="modal fade" id="agregar_productos-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregar_productosLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="agregar_productosLabel">Registro Productos</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipoManu" class="form-label d-flex">Tipos de Manufacturación:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectTipoManu" name="selectTipoManu" required>
                                            <option value="">[-seleccione tipo de manufacturación-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="selectTipos" class="form-label d-flex">Tipos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectTipos" name="selectTipos" required>
                                            <option value="">[-seleccione tipo-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="show_subtipo" style="display: none;">
                                    <div class="form-group">
                                        <label for="selectSubTipos" class="form-label d-flex">Sub Tipos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label></label>
                                        <select class="form-select select2modal" id="selectSubTipos" name="selectSubTipos">
                                            <option value="">[-seleccione sub tipo-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectMateriales" class="form-label d-flex">Materiales:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label></label>
                                        <select class="form-select select2modal" id="selectMateriales" name="selectMateriales" required>
                                            <option value="">[-seleccione material-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectClases" class="form-label d-flex">Clases:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectClases" name="selectClases" required>
                                            <option value="">[-seleccione clase-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="show_subclase" style="display: none;">
                                    <div class="form-group">
                                        <label for="selectSubClases" class="form-label d-flex">Sub Clases:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <select class="form-select select2modal" id="selectSubClases" name="selectSubClases">
                                            <option value="">[-seleccione sub clase-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textPrecio" class="form-label d-flex">Precio:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" min="0.0" step="any" value="0.0" class="form-control" id="textPrecio" name="textPrecio" placeholder="Precio" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnProductos">
                                <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <!-- Modal -->
        <form class="formularios" id="frmActualizarProductos" method="post" autocomplete="off">
            <div class="modal fade" id="actualizar_productos-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizar_productosLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-uppercase fs-5" id="actualizar_productosLabel">Actualizar Producto</h1>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" id="param" name="param" required>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textDescripcion" class="form-label">Descripción:</label>
                                        <input type="text" class="form-control" id="textDescripcion" name="textDescripcion" placeholder="Descripción" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="textPrecio" class="form-label d-flex">Precio:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                        <input type="number" min="0.0" step="any" value="0.0" class="form-control" id="textPrecio" name="textPrecio" placeholder="Precio" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info btn-sm" id="btnProductos">
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