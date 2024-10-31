<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">
                                <a href="login" class="btn bg-gradient-info btn-icon-only mb-0 mt-3">
                                    <i class="fas fa-chevron-left" style="-webkit-text-fill-color: white;" aria-hidden="true"></i>
                                </a>
                                Cambia tu contraseña RBCLab
                            </h3>
                            <p class="mb-0">Ingresa tu nueva contraseña para iniciar sesión</p>
                        </div>
                        <div class="card-body">
                            <form id="frmChangePassword" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="textCorreo">Correo:</label>
                                    <div class="mb-3">
                                        <input class="form-control" type="email" name="textCorreo" id="textCorreo" placeholder="Correo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textNuevoPassword">Nueva Contraseña:</label>
                                    <div class="mb-3">
                                        <input class="form-control" type="password" name="textNuevoPassword" id="textNuevoPassword" placeholder="Nueva Contraseña" minlength="6" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textConfirmarPassword">Confirmar Contraseña:</label>
                                    <div class="mb-3">
                                        <input class="form-control" type="password" name="textConfirmarPassword" id="textConfirmarPassword" placeholder="Confirmar Contraseña" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" id="btnCambiarPassword">
                                        <span class="spinner-border spinner-border-sm" id="spinnerCambiarPassword" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                        </span>
                                        <i class="fa-solid fa-paper-plane"></i> Cambiar Contraseña
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('views/assets/img/spektro_fondo2.jpeg');background-size: 100% 100%;background-repeat: no-repeat;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>

<script src="views/assets/js/src/model/cambiarpasswordModel.js"></script>
<script src="views/assets/js/src/controller/cambiarpasswordController.js"></script>
<script src="views/assets/js/src/view/cambiarpasswordView.js"></script>
<script src="views/assets/js/src/app/cambiarpasswordApp.js"></script>
