<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Salidas - Stock</h4>
    </div>
    <div class="d-flex m-3">
        <div class="ms-auto d-flex">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-info text-info" data-bs-toggle="modal" data-bs-target="#agregar-modal">
                    <i class="fa fa-plus" aria-hidden="true"></i> INGRESO PARA SALIDA DEL STOCK
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblListSalidaStock" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>CÓDIGO</th>
                            <th>PRODUCTO A SALIR</th>
                            <th>CANTIDAD</th>
                            <th>LOCAL</th>
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
    <form class="formularios" id="frmRegistrarSalidaStock" action="" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Productos</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <select class="form-select" id="selectTrabajo" name="selectTrabajo" required disabled>
                                <option value="Stck" selected>Stock</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectManufacturaStock" class="form-label d-flex">Tipo de Manufacturación Stock:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                            <select class="form-select" id="selectManufacturaStock" name="selectManufacturaStock" required disabled>
                                <option value="">[seleccione tipo de Manufacturación]</option>
                            </select>
                        </div>
                        <div class="col-12 my-3">
                            <a href="#" id="btn_Items"><i class="far fa-file-excel ml-2"></i> Exportar Producto Stock</a>
                        </div>
                        <div class="form-group">
                            <label for="selectLocal" class="form-label d-flex">Local a enviar producto:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                            <select class="form-select select2modal" id="selectLocal" name="selectLocal" required>
                                <option value="">[seleccione el local]</option>
                            </select>
                        </div>
                        <div class="col-12 my-4">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="archivoExcel" id="archivoExcel" accept=".xls, .xlsx">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnSalida">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                            <i class="fas fa-upload"></i>
                            Cargar Archivo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="loading" style="display: none;">
        <div class="loading-overlay"></div>
        <div class="loading-image">
            <img src="views/assets/img/loading.gif" width="100%" alt="Cargando...">
        </div>
    </div>
</section>

<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="views/assets/js/select2/selectLocales.js"></script>
<script src="views/assets/js/select2/selectSalidaStock.js"></script>

<script src="views/assets/js/src/model/salidastockModel.js"></script>
<script src="views/assets/js/src/controller/salidastockController.js"></script>
<script src="views/assets/js/src/view/salidastockView.js"></script>
<script src="views/assets/js/src/app/salidastockApp.js"></script>