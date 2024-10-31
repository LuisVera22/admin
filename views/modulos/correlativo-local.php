<div class="modal fade" id="info-series" tabindex="-1" aria-labelledby="correlativolocalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-uppercase fs-5" id="correlativolocalModalLabel">Series de la sede:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <dov class="col-lg-5">
                        <div class="card shadow-lg">
                            <form class="formularios" id="frmRegistrarCorrelativoLocal" method="post" autocomplete="off">
                                <div class="card-body">
                                    <div class="row">
                                    <input type="hidden" class="form-control" id="param" name="param" required>
                                        <div class="form-group">
                                            <label for="selectDocumentoventa" class="form-label d-flex">Documento de venta:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <select class="form-select select2modal" id="selectDocumentoventa" name="selectDocumentoventa" required>
                                                <option value="">[seleccione documento de venta]</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="selectSerie" class="form-label d-flex">Serie:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <select class="form-select select2modal" id="selectSerie" name="selectSerie" required>
                                                <option value="">[seleccione serie]</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="textInicioNum" class="form-label d-flex">Inicia en:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                            <input type="text" class="form-control" id="textInicioNum" name="textInicioNum" placeholder="Inicia en" required disabled>
                                        </div>
                                    </div>
                                    <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnCorrelativoLocal">
                                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;"></span>
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </dov>
                    <dov class="col-lg-7">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tblListCorrelativoLocal" class="table table-flush table-hover" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tip. Doc.</th>
                                                <th>Serie</th>
                                                <th>Correlativo</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </dov>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btnCerrar" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="views/assets/js/src/model/localModel.js"></script>
<script src="views/assets/js/src/controller/localController.js"></script>
<script src="views/assets/js/src/view/localView.js"></script>
<script src="views/assets/js/src/app/localApp.js"></script>

<script src="views/assets/js/src/model/correlativoModel.js"></script>
<script src="views/assets/js/src/controller/correlativoController.js"></script>
<script src="views/assets/js/src/view/correlativoView.js"></script>
<script src="views/assets/js/src/app/correlativoApp.js"></script>

<script src="views/assets/js/select2/selectDocumentoVentas.js"></script>
<script src="views/assets/js/select2/selectSedes.js"></script>
<script src="views/assets/js/select2/selectCorrelativo.js"></script>