<section class="container-fluid py-4" style="overflow-x: hidden;">
    <div class="fondo_pantalla"></div>
    <div class="d-flex pb-4">
        <div>
            <a href="ordenes-trabajo" class="btn bg-gradient-info btn-icon-only mb-0" id="btn_retroceder">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
        <div class="ms-3">
            <h4>Nueva Orden de Trabajo</h4>
        </div>
    </div>
    <div class="card shadow-lg" id="encabezado_orden">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="d-flex">
                        <div class="form-group w-100">
                            <label for="selectCliente" class="form-label">Códigos/Clientes:</label>
                            <div class="input-group">
                                <select class="form-select select2Busqueda" id="selectCliente" name="selectCliente" required>
                                    <option value="">[-seleccione codigo/cliente-]</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin: 2.1rem 0.5rem;">
                            <button type="button" class="btn btn-outline-primary text-primary m-0 p-2" data-bs-toggle="modal" data-bs-target="#agregar-modal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="textCliente" class="form-label">Cliente:</label>
                            <input type="text" class="form-control" name="textCliente" id="textCliente" placeholder="Cliente" required disabled>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="selectTipoDocumento" class="form-label">Tipo Documento:</label>
                                <select class="form-select select2Busqueda" id="selectTipoDocumento" name="selectTipoDocumento" required disabled>
                                    <option value="">[-seleccione tipo documento-]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="textNDocumento" class="form-label">N° Documento:</label>
                                <input type="number" class="form-control cajaNumerico" name="textNDocumento" id="textNDocumento" placeholder="N° Documento" required disabled>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="textDireccion" class="form-label">Dirección/Dirección Fiscal:</label>
                            <input type="text" class="form-control" name="textDireccion" id="textDireccion" placeholder="Dirección" disabled>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="selectTipoManufactura" class="form-label">Tipo Manufacturación:</label>
                            <select class="form-select select2Busqueda" id="selectTipoManufactura" name="selectTipoManufactura" required>
                                <option value="">[seleccione manufacturación]</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="textEmision" class="form-label">Fecha de Emisión:</label>
                                <div class="input-group date textEmision">
                                    <input type="text" class="form-control" name="textEmision" id="textEmision" required disabled>
                                    <span class="input-group-addon">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="textTiempoEntrega" class="form-label">Tiempo de Entrega:</label>
                                <input type="text" class="form-control" name="textTiempoEntrega" id="textTiempoEntrega" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="selectMensajero" class="form-label">Mensajeros:</label>
                                        <select class="form-select select2Busqueda" id="selectMensajero" name="selectMensajero">
                                            <option value="">[-seleccione mensajero-]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="selectRecepcionado" class="form-label">Recepcionado por:</label>
                                        <select class="form-select select2Busqueda" id="selectRecepcionado" name="selectRecepcionado" required>
                                            <option value="">[seleccione vendedor]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="selectSede" class="form-label">Sedes:</label>
                                <select class="form-select select2Busqueda" id="selectSede" name="selectSede" required>
                                    <option value="">[seleccione sede]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="selectFormaPago" class="form-label">Forma de Pago:</label>
                                        <select class="form-select" id="selectFormaPago" name="selectFormaPago" required>
                                            <option value="CONTADO">CONTADO</option>
                                            <option value="CRÉDITO">CRÉDITO</option>
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
    <div class="my-3">
        <button type="button" class="btn btn-outline-info text-info" id="agregando_item">
            <i class="fa fa-plus me-2"></i> Agregar Item
        </button>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table id="secondTable" class="table table-flush table-hover" width="100%">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th></th>
                            <th>CANT.</th>
                            <th>UNID. MED.</th>
                            <th style="width: 50%;">DESCRIPCIÓN</th>
                            <th>PREC. UNIT.</th>
                            <th>DESCUENTO</th>
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
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-8 my-2 order-2 order-md-1">
                            <div class="form-group">
                                <label for="textObservacion" class="form-label">Observaciones extras</label>
                                <textarea class="form-control" name="textObservacion" id="textObservacion" rows="5"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Pendiente a Pagar (P.P.)
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 d-flex justify-content-end order-1 order-md-2 my-2">
                            <table>
                                <tbody>
                                    <tr>
                                        <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Sub Total: </th>
                                        <th>
                                            <input type="number" step="any" class="form-control text-end my-1" id="sub_total" name="sub_total" placeholder="0.00" disabled>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">IGV(18%): </th>
                                        <th>
                                            <input type="number" step="any" class="form-control text-end my-1" id="igv" name="igv" placeholder="0.00" disabled>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Total: </th>
                                        <th>
                                            <input type="number" step="any" class="form-control text-end my-1" id="total" name="total" placeholder="0.00" disabled>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Adelanto: </th>
                                        <th>
                                            <input type="number" step="0.1" min="0" class="form-control text-end my-1" id="adelanto" name="adelanto" value="0.0" placeholder="0.00">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;line-height: 2.5;padding-right: 1rem;" scope="row">Saldo: </th>
                                        <th>
                                            <input type="number" min="0" class="form-control text-end my-1" id="saldo" name="saldo" value="0.0" placeholder="0.00" disabled>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 cuadro_credito order-3">
                            <div class="my-2">
                                <button type="button" class="btn btn-outline-danger text-danger" id="agregando_cuotas">
                                    <i class="fa fa-plus me-2"></i> Agregar Cuotas
                                </button>
                            </div>
                            <div class="card shadow-lg my-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="secondTableCuotas" class="table table-flush table-hover" width="100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>FECHA</th>
                                                    <th>MONTO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row text-center align-items-center">
                        <div class="col-md-4 p-2">
                            <a href="ordenes-trabajo" class="btn btn-outline-secondary btn-sm" id="btn_cancelar">CANCELAR</a>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" class="btn btn-outline-success btn-sm" id="btnOrdenTrabajo">
                                Guardar
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="submit" class="btn btn-outline-success btn-sm" id="btnOrdenTrabajoVenta">
                                Guardar y Vender
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form id="frmRegistrarCliente" method="post" autocomplete="off">
        <div class="modal fade" id="agregar-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarLabel">Registro Cliente</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div>
                                <div class="form-group">
                                    <label for="selectTipoDocumento" class="form-label d-flex">Tipos de Documentos:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <select class="form-select select2modal" id="selectTipoDocumento" name="selectTipoDocumento" required>
                                        <option value="">[seleccione documento venta]</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="textNDocumento" class="form-label d-flex">Número Documento:<p class="text-danger mb-0" style="font-size: small;">(*)</p></label>
                                    <input type="number" class="form-control" id="textNDocumento" name="textNDocumento" placeholder="Número de Documento" required>
                                </div>
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
                            <div>
                                <div class="form-group">
                                    <label for="textRazonSocial" class="form-label">Razón Social:</label>
                                    <input type="text" class="form-control" id="textRazonSocial" name="textRazonSocial" placeholder="Razón Social">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="textNombreComercial" class="form-label">Nombre Comercial:</label>
                                    <input type="text" class="form-control" id="textNombreComercial" name="textNombreComercial" placeholder="Nombre Comercial">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="textContacto" class="form-label">Contácto:</label>
                                    <input type="text" class="form-control" id="textContacto" name="textContacto" placeholder="Teléfono/Celular">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="textDireccion" class="form-label">Dirección:</label>
                                    <input type="text" class="form-control" id="textDireccion" name="textDireccion" placeholder="Dirección">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="textDireccionFiscal" class="form-label">Dirección Fiscal:</label>
                                    <input type="text" class="form-control" id="textDireccionFiscal" name="textDireccionFiscal" placeholder="Dirección Fiscal">
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mb-0" style="font-size: small;">Datos requeridos <span class="badge badge-light text-danger p-0">(*)</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="frmRegistrarItems" method="post" autocomplete="off">
        <div class="modal fade" id="agregarItem" aria-hidden="true" aria-labelledby="agregarItemLabel" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="agregarItemLabel">cargar Items</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="overflow-x: hidden;">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos-tab-pane" type="button" role="tab" aria-controls="productos-tab-pane" aria-selected="false">Productos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="servicios-tab" data-bs-toggle="tab" data-bs-target="#servicios-tab-pane" type="button" role="tab" aria-controls="servicios-tab-pane" aria-selected="false">Servicios</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="productos-tab-pane" role="tabpanel" aria-labelledby="productos-tab" tabindex="0"><?php require_once 'items_orden_trabajo/productos.php'; ?></div>
                            <div class="tab-pane fade" id="servicios-tab-pane" role="tabpanel" aria-labelledby="servicios-tab" tabindex="0"><?php require_once 'items_orden_trabajo/servicios.php'; ?></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Update-->
    <form id="frmEditarItems" method="post" autocomplete="off">
        <div class="modal fade" id="actualizarItem" tabindex="-1" aria-labelledby="actualizarItemLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="actualizarItemLabel">Editar Base</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="overflow-x: hidden;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div>
                                            <p class="mb-1">Bases:</p>
                                            <hr class="border border-dark border-bottom my-1" />
                                        </div>
                                        <div class="form-group">
                                            <label for="selectProductoItem" class="form-label">Productos:</label>
                                            <div class="input-group">
                                                <select class="form-select select2modalUdt" id="selectProductoItem" name="selectProductoItem">
                                                    <option value="">[-seleccione producto-]</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textDetalleProducto" class="form-label">Detalle del Producto:</label>
                                            <input type="text" class="form-control" name="textDetalleProducto" id="textDetalleProducto" placeholder="Detalle del Producto" disabled>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textCantidad" class="form-label">Cantidad:</label>
                                                <input type="number" min="0" pattern="[0-9]*" value="1" class="form-control" name="textCantidad" id="textCantidad" placeholder="Cantidad">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textPrecio" class="form-label">Precio:</label>
                                                <input type="text" class="form-control" name="textPrecio" id="textPrecio" placeholder="Precio">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card card-primary card-outline collapsed-card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">
                                                        <button type="button" class="btn btn-tool mb-0" data-bs-toggle="collapse" data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro" style="display: flex;width: 100%;    padding: 0.75rem 1.25rem;">
                                                            <div class="me-2"><i class="fas fa-glasses"></i></div>
                                                            <div style="width: 100%;text-align:left;">Monturas (opcional)</div>
                                                            <div id="iconContainer"><i class="fas fa-plus"></i></div>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div class="collapse" id="collapseFiltro">
                                                    <div class="card-body">
                                                        <hr class="border border-dark border-bottom" />
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="selectMaterial" class="form-label">Material:</label>
                                                                    <select class="form-select select2modalUdt" id="selectMaterial" name="selectMaterial">
                                                                        <option value="">[-seleccione material-]</option>
                                                                        <option value="Metal">Metal</option>
                                                                        <option value="Acetato">Acetato</option>
                                                                        <option value="TR-90">TR-90</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="selectModelo" class="form-label">Modelos:</label>
                                                                    <select class="form-select select2modalUdt" id="selectModelo" name="selectModelo">
                                                                        <option value="">[-seleccione modelo-]</option>
                                                                        <option value="Aro Completo">Aro Completo</option>
                                                                        <option value="Semi Al Aire">Semi Al Aire</option>
                                                                        <option value="Al Aire">Al Aire</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="selectCondicion" class="form-label">Condiciones:</label>
                                                                    <select class="form-select select2modalUdt" id="selectCondicion" name="selectCondicion">
                                                                        <option value="">[-seleccione condición-]</option>
                                                                        <option value="Nuevo">Nuevo</option>
                                                                        <option value="Usado">Usado</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label id="textColor" class="form-label">Color:</label>
                                                                    <input type="text" class="form-control" name="textColor" id="textColor" placeholder="escriba el color">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label id="textMarca" class="form-label">Marca:</label>
                                                                    <input type="text" class="form-control" id="textMarca" name="textMarca" placeholder="escriba la marca">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-12" id="mostrar_parametros_udt">
                                            <p class="mb-1">Parámetros:</p>
                                            <hr class="border border-dark border-bottom my-1" />
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="textV" class="form-label">V:</label>
                                                        <input type="text" class="form-control" name="textV" id="textV">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="textH" class="form-label">H:</label>
                                                        <input type="text" class="form-control" name="textH" id="textH">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="textD" class="form-label">D:</label>
                                                        <input type="text" class="form-control" name="textD" id="textD">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="textPte" class="form-label">PTE:</label>
                                                        <input type="text" class="form-control" name="textPte" id="textPte">
                                                    </div>
                                                </div>
                                                <div class="col" id="alt_show">
                                                    <div class="form-group">
                                                        <label for="textAlt" class="form-label">ALT:</label>
                                                        <input type="text" class="form-control" name="textAlt" id="textAlt">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-check align-content-center">
                                                    <input class="form-check-input" type="checkbox" id="CheckAlturas">
                                                    <label class="form-check-label text-info" for="CheckAlturas">
                                                        Seleccionar si existe 2 alturas
                                                    </label>
                                                </div>
                                                <div class="d-none" id="alt_doble">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="textAltOd" class="form-label">ALT OD:</label>
                                                                        <input type="text" class="form-control" name="textAltOd" id="textAltOd">
                                                                    </div>

                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="textAltOi" class="form-label">ALT OI:</label>
                                                                        <input type="text" class="form-control" name="textAltOi" id="textAltOi">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-1">Laboratório</p>
                                            <hr class="border border-dark border-bottom my-1" />
                                            <div class="row style_laboratorio">
                                                <div class="col px-1 text-center">
                                                    <strong>ESF.</strong>
                                                </div>
                                                <div class="col px-1 text-center">
                                                    <strong>CIL.</strong>
                                                </div>
                                                <div class="col px-1 text-center">
                                                    <strong>ADD</strong>
                                                </div>
                                                <div class="col px-1 text-center">
                                                    <strong>EJE</strong>
                                                </div>
                                                <div class="col px-1 text-center">
                                                    <strong>PRISMA</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectEsfOD" name="selectEsfOD">
                                                            <option value="">[-Esf-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectCilOD" name="selectCilOD">
                                                            <option value="">[-Cil-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectAddOD" name="selectAddOD">
                                                            <option value="">[-Add-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="textEjeOD" id="textEjeOD" placeholder="EJE OD">
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="textPrismaOD" id="textPrismaOD" placeholder="PRISMA OD">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectEsfOI" name="selectEsfOI">
                                                            <option value="">[-Esf-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectCilOI" name="selectCilOI">
                                                            <option value="">[-Cil-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="input-group">
                                                        <select class="form-select select2modalUdt" id="selectAddOI" name="selectAddOI">
                                                            <option value="">[-Add-]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="textEjeOI" id="textEjeOI" placeholder="EJE OI">
                                                    </div>
                                                </div>
                                                <div class="col px-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="textPrismaOI" id="textPrismaOI" placeholder="PRISMA OI">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div id="show_dip">
                                                        <div class="form-group">
                                                            <label for="textDnp_Dip" class="form-label">DNP/DIP:</label>
                                                            <input type="text" class="form-control" name="textDnp_Dip" id="textDnp_Dip" placeholder="DNP/DIP">
                                                        </div>
                                                    </div>
                                                    <div class="d-none" id="dual_dip">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="textDnp_Dip_Od" class="form-label">DNP/DIP OD:</label>
                                                                    <input type="text" class="form-control" name="textDnp_Dip_Od" id="textDnp_Dip_Od" placeholder="DNP/DIP">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="textDnp_Dip_Oi" class="form-label">DNP/DIP OI:</label>
                                                                    <input type="text" class="form-control" name="textDnp_Dip_Oi" id="textDnp_Dip_Oi" placeholder="DNP/DIP">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check align-content-center">
                                                        <input class="form-check-input" type="checkbox" id="CheckDips">
                                                        <label class="form-check-label text-info" for="CheckDips">
                                                            Seleccionar si existe 2 DIP
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="textIniciales" class="form-label">Iniciales del Paciente:</label>
                                                        <input type="text" class="form-control" name="textIniciales" id="textIniciales" placeholder="Inic. del Pasc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div id="show_diametro">
                                                        <div class="form-group">
                                                            <label for="textDiametro" class="form-label">DIÁMETRO:</label>
                                                            <input type="text" class="form-control" name="textDiametro" id="textDiametro" placeholder="Diámetro">
                                                        </div>
                                                    </div>
                                                    <div class="d-none" id="diametro_dual">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="textDiametroOd" class="form-label">DIÁMETRO OD:</label>
                                                                    <input type="text" class="form-control" name="textDiametroOd" id="textDiametroOd" placeholder="Diámetro OD">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="textDiametroOi" class="form-label">DIÁMETRO OI:</label>
                                                                    <input type="text" class="form-control" name="textDiametroOi" id="textDiametroOi" placeholder="Diámetro OI">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check align-content-center">
                                                        <input class="form-check-input" type="checkbox" id="CheckDiametro">
                                                        <label class="form-check-label text-info" for="CheckDiametro">
                                                            Seleccionar si existe 2 Diametro
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="textCorredor" class="form-label">Corredor:</label>
                                                        <input type="text" class="form-control" name="textCorredor" id="textCorredor" placeholder="Corredor">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="textReduccion" class="form-label">Reducción:</label>
                                                        <input type="text" class="form-control" name="textReduccion" id="textReduccion" placeholder="Reducción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-outline-info" id="update_item">Actualizar Items</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="formularios" id="frmRegistrarCuotas" method="post" autocomplete="off">
        <div class="modal fade" id="cuotas-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cuotas-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-uppercase fs-5" id="cuotas-modalLabel">Registro de Cuotas</h1>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="numberMonto" class="form-label">Monto:</label>
                                    <input type="number" step="any" min="0.0" class="form-control" name="numberMonto" id="numberMonto" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="textFechaCuota" class="form-label">Fecha:</label>
                                    <div class="input-group date textFechaCuota">
                                        <input type="text" class="form-control" name="textFechaCuota" id="textFechaCuota" required>
                                        <span class="input-group-addon">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="btnPersonal">
                            <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                            </span>Guardar</button>
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
<script src="views/assets/js/select2/selectCliente.js"></script>
<script src="views/assets/js/select2/selectTipoDocumento.js"></script>
<script src="views/assets/js/select2/selectTipoManufactura.js"></script>
<script src="views/assets/js/select2/selectMensajero.js"></script>
<script src="views/assets/js/select2/selectVendedor.js"></script>
<script src="views/assets/js/select2/selectLocales.js"></script>
<script src="views/assets/js/select2/selectAdd.js"></script>
<script src="views/assets/js/select2/selectEsf.js"></script>
<script src="views/assets/js/select2/selectCil.js"></script>

<script src="views/assets/js/src/model/ordentrabajoModel.js"></script>
<script src="views/assets/js/src/controller/ordentrabajoController.js"></script>
<script src="views/assets/js/src/view/ordentrabajoView.js"></script>
<script src="views/assets/js/src/app/ordentrabajoApp.js"></script>