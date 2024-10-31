<section class="container-fluid py-4">
    <div>
        <h4>Datos de Empresa</h4>
        <p>Configuración de los datos de la empresa</p>
    </div>
    <div class="row mt-4">
        <div class="col-lg-8 mt-lg-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Información:</h5>
                    <form id="frmEmpresa" action="" autocomplete="off">
                        <div class="row">
                            <input class="form-control" type="hidden" name="param" id="param">
                            <div class="col-12 col-sm-6">
                                <label for="textruc">Ruc:</label>
                                <input class="form-control cajaNumerico" type="number" name="textruc" id="textruc" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="textrazonsocial">Razón Social:</label>
                                <input class="form-control" type="text" name="textrazonsocial" id="textrazonsocial" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="textdireccion">Dirección:</label>
                                <input class="form-control" type="text" name="textdireccion" id="textdireccion" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="textdireccionfiscal">Dirección Fiscal:</label>
                                <input class="form-control" type="text" name="textdireccionfiscal" id="textdireccionfiscal">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="textcorreo">Correo Corporativo:</label>
                                <input class="form-control" type="email" name="textcorreo" id="textcorreo">
                            </div>
                            <div class="mt-5">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0" type="submit" id="btnEmpresa">
                                        <span class="spinner-border spinner-border-sm" id="spinnerButton" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                        </span>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow-lg mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h5>Ingresar Tiendas</h5>
                            <p class="text-sm">Configura las tiendas o sucursales, series como Facturas, Boletas,Nota de Crédito,Notas de Venta y Guias de Remisión</p>
                            <div class="mt-2">
                                <form id="frmLocal" action="locales" method="post">
                                    <input class="form-control" type="hidden" name="paramLocal" id="paramLocal">
                                    <button class="btn btn-info btn-sm mb-0 me-2" type="button" id="btnEnviarLocal"><i class="fas fa-hand-point-right me-2"></i>Configurar</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h5>Ingresar series electrónica</h5>
                            <p class="text-sm">Configura las series de los documentos digitales</p>
                            <div class="mt-2">
                                <form action="correlativos" method="post">
                                    <button class="btn btn-info btn-sm mb-0 me-2" type="submit"><i class="fas fa-hand-point-right me-2"></i>Configurar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-lg-0 mt-4">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Logo</h5>
                    <p class="text-danger">
                        <strong>IMAGEN :</strong> Tamaño menor a 2MB.
                    </p>
                    <form id="frmImage" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <label for="imgBusiness" id="icon-image" class="btn btn-primary"><i class="fas fa-plus"></i></label>
                                <span id="name-img"></span>
                                <input type="file" name="imgBusiness" id="imgBusiness" accept=".jpg, .jpeg, .png" class="d-none" required>
                                <img class="w-100 border-radius-lg shadow-lg mt-3 img-fluid" alt="logo_spektro" name="img-preview" id="img-preview">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary btn-sm mb-0 me-2" type="submit" id="btnEmpresaImage">
                                        <span class="spinner-border spinner-border-sm" id="spinnerButtonImage" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                        </span>
                                        Editar</button>
                                    <button class="btn btn-outline-danger btn-sm mb-0 d-none" type="button" id="icon-cerrar">Remover</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="views/assets/js/src/model/empresaModel.js"></script>
<script src="views/assets/js/src/controller/empresaController.js"></script>
<script src="views/assets/js/src/view/empresaView.js"></script>
<script src="views/assets/js/src/app/empresaApp.js"></script>