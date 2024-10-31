<section class="container-fluid py-4">
    <div class="pb-3">
        <h4>Boletas</h4>
    </div>

    <div class="card card-primary card-outline collapsed-card">
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

                <div class="d-flex">
                    <div class="ms-auto d-flex">
                        <div class="ps-4">
                            <div class="form-group">
                                <label id="textInicio" class="form-label">Fecha Inicio:</label>
                                <div class="input-group date textInicio">
                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textInicio">
                                    <span class="input-group-addon">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="ps-4">
                            <div class="form-group">
                                <label id="textFin" class="form-label">Fecha Fin:</label>
                                <div class="input-group date textFin">
                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textFin">
                                    <span class="input-group-addon">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="ps-4 m-auto pt-3">
                            <button type="button" class="btn btn-outline-info text-info mb-0 p-2" id="filterFecha">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="ps-2 m-auto pt-3">
                            <button type="button" class="btn btn-outline-dark text-dark mb-0 p-2" id="filterFecha">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr class="border border-dark border-bottom" />
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label id="filtroBoleta" class="form-label">Boleta:</label>
                            <input type="text" class="form-control" placeholder="Boleta" data-index="2" id="filtroBoleta">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label id="filtroOrden" class="form-label">N° Orden:</label>
                            <input type="text" class="form-control" placeholder="N° Orden" data-index="2" id="filtroOrden">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label id="filtroCliente" class="form-label">Cliente:</label>
                            <input type="text" class="form-control" placeholder="Cliente" data-index="3" id="filtroCliente">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label id="filtroNDocumento" class="form-label">N° Documento:</label>
                            <input type="number" class="form-control cajaNumerico" placeholder="N° Documento" data-index="3" id="filtroNDocumento">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-lg mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>IMPRESIÓN</th>
                            <th></th>
                            <th>ESTADO</th>
                            <th>SUNAT</th>
                            <th>FECHA</th>
                            <th>NÚMERO</th>
                            <th>N° ORDEN</th>
                            <th>CLIENTE</th>
                            <th>N° DOC.</th>
                            <th>FORMA DE PAGO</th>
                            <th>TOTAL</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>