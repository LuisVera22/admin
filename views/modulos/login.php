<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Bienvenido RBCLab</h3>
                            <p class="mb-0">Ingresa tu usuario y contraseña para iniciar sesión</p>
                        </div>
                        <div class="card-body">
                            <form id="frmLogin" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="username">Usuario</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="username" id="username" value="admin" placeholder="Usuario" aria-label="Usuario" aria-describedby="usuario-addon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" id="password" value="larone" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="contraseña-addon" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" id="btnLogin">
                                        <span class="spinner-border spinner-border-sm" id="spinnerLogin" role="status" aria-hidden="true" style="width: 1rem;height: 1rem;display: none;">
                                        </span>
                                        <i class="fas fa-sign-out-alt"></i> Ingresar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                <a href="cambiar-contraseña" class="text-info text-gradient font-weight-bold">Reestablecer contraseña</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('views/assets/img/spektro_logo.png');background-size: 100% 100%;background-repeat: no-repeat;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="views/assets/js/plugins/jquery-3.7.1.min.js"></script>
<script src="views/assets/js/src/model/loginModel.js"></script>
<script src="views/assets/js/src/controller/loginController.js"></script>
<script src="views/assets/js/src/view/loginView.js"></script>
<script src="views/assets/js/src/app/loginApp.js"></script>