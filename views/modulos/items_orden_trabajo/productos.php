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
                        <select class="form-select select2modal" id="selectProductoItem" name="selectProductoItem">
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
                        <input type="text" class="form-control" name="textPrecio" id="textPrecio" placeholder="Precio" >
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
                                            <select class="form-select select2modal" id="selectMaterial" name="selectMaterial">
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
                                            <select class="form-select select2modal" id="selectModelo" name="selectModelo">
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
                                            <select class="form-select select2modal" id="selectCondicion" name="selectCondicion">
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
                <div class="col-12" id="mostrar_parametros">
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
                                <select class="form-select select2modal" id="selectEsfOD" name="selectEsfOD">
                                    <option value="">[-Esf-]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col px-1">
                            <div class="input-group">
                                <select class="form-select select2modal" id="selectCilOD" name="selectCilOD">
                                    <option value="">[-Cil-]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col px-1">
                            <div class="input-group">
                                <select class="form-select select2modal" id="selectAddOD" name="selectAddOD">
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
                                <select class="form-select select2modal" id="selectEsfOI" name="selectEsfOI">
                                    <option value="">[-Esf-]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col px-1">
                            <div class="input-group">
                                <select class="form-select select2modal" id="selectCilOI" name="selectCilOI">
                                    <option value="">[-Cil-]</option>
                                </select>
                            </div>
                        </div>
                        <div class="col px-1">
                            <div class="input-group">
                                <select class="form-select select2modal" id="selectAddOI" name="selectAddOI">
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
        <div class="col-12 my-3 text-end">
            <button type="button" class="btn btn-outline-primary" id="cargar_producto"><i class="fas fa-cash-register mx-2"></i>Cargar Item</button>
        </div>
    </div>
</div>