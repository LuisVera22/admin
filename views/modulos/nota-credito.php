<section class="container-fluid py-4">
    <div class="d-flex pb-4">
        <div>
            <a href="facturaciones" class="btn bg-gradient-info btn-icon-only mb-0">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
        <div class="ms-3">
            <h4>Nota de Crédito</h4>
        </div>
    </div>
    <form class="frmNotaCredito" action="" method="post" autocomplete="off">
        <div class="card shadow-lg mt-3">

            <div class="card-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTipoDocumento" class="form-label">Tipos de Documentos:</label>
                                        <select class="form-select select2Busqueda" id="selectTipoDocumento" name="selectTipoDocumento" required>
                                            <option value="">[seleccione tipo de documento]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textNDocumento" class="form-label">Número Documento:</label>
                                        <input type="number" class="form-control cajaNumerico" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textCliente" class="form-label">Cliente:</label>
                                        <input type="text" class="form-control" id="textCliente" name="textCliente" placeholder="Nombres del Cliente">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textDireccion" class="form-label">Dirección:</label>
                                        <input type="text" class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textTelefono" class="form-label">Teléfono:</label>
                                        <input type="number" class="form-control cajaNumerico" id="textTelefono" name="textTelefono" placeholder="Teléfono">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textAnexo" class="form-label">Anexo:</label>
                                        <input type="text" class="form-control" id="textAnexo" name="textAnexo" placeholder="Anexo">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textOtrabajo" class="form-label">Orden de Trabajo:</label>
                                        <input type="text" class="form-control" id="textOtrabajo" name="textOtrabajo" placeholder="Orden de trabajo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectDocumVenta" class="form-label">Documento de Venta:</label>
                                        <select class="form-select select2Busqueda" id="selectDocumVenta" name="selectDocumVenta" required>
                                            <option value="">[seleccione documento venta]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectCorrelativo" class="form-label">Correlativo:</label>
                                        <select class="form-select select2Busqueda" id="selectCorrelativo" name="selectCorrelativo" required>
                                            <option value="">[seleccione correlativo]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="selectTNotaCredito" class="form-label">Tipo de Nota de Crédito:</label>
                                        <select class="form-select select2Busqueda" id="selectTNotaCredito" name="selectTNotaCredito" required>
                                            <option value="">[seleccione correlativo]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="textMotivo" class="form-label">Motivo:</label>
                                        <input type="text" class="form-control" id="textMotivo" name="textMotivo" placeholder="Motivo" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label id="textFechaEmision" class="form-label">Fecha de Emisión:</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textFechaEmision" name="textFechaEmision" required>
                                                            <span class="input-group-addon">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label id="textFechaEntrega" class="form-label">Fecha de Entrega:</label>
                                                                <div class="input-group date">
                                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="textFechaEntrega" name="textFechaEntrega" required>
                                                                    <span class="input-group-addon">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="textTiempoEntrega" class="form-label">Tiempo de Entrega:</label>
                                                                <input type="text" class="form-control" name="textTiempoEntrega" id="textTiempoEntrega" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="selectFormaPago" class="form-label">Forma de Pago:</label>
                                                        <select class="form-select select2Busqueda" id="selectFormaPago" name="selectFormaPago" required>
                                                            <option value="">[seleccione correlativo]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="selectFormaPago" class="form-label">Forma de Pago:</label>
                                                        <select class="form-select select2Busqueda" id="selectFormaPago" name="selectFormaPago" required>
                                                            <option value="">[seleccione correlativo]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="selectVendedor" class="form-label">Vendedor:</label>
                                            <select class="form-select select2Busqueda" id="selectVendedor" name="selectVendedor" required>
                                                <option value="">[seleccione vendedor]</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-lg mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush table-hover" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>CANTIDAD</th>
                                <th>UNIDAD MEDIDA</th>
                                <th>DESCRIPCIÓN</th>
                                <th>PRECIO UNIT.</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <table>
                            <tbody>
                                <tr>
                                    <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Sub Total: </th>
                                    <th>
                                        <input type="number" class="form-control text-end my-1" id="sub_total" name="sub_total" placeholder="0.00" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">IGV(18%): </th>
                                    <th>
                                        <input type="number" class="form-control text-end my-1" id="igv" name="igv" placeholder="0.00" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Total: </th>
                                    <th>
                                        <input type="number" class="form-control text-end my-1" id="total" name="total" placeholder="0.00" disabled>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <div class="d-flex mt-3">
                            <div class="ms-auto d-flex">
                                <div class="ps-4">
                                    <a href="facturaciones" class="btn btn-outline-secondary btn-sm">Cerrar</a>
                                </div>
                                <div class="ps-4">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>