class EmpresaController {
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }

    onImageFormSubmit() {
        var $param = $("#param").val();
        var $file = $('#imgBusiness')[0].files[0];
        var tamano = $file.size / 2097152;

        if ($param == "" || $param == null) {
            Swal.fire('Necesitas llenar la Información de la empresa para adjuntar imagen <i class="far fa-smile-wink"></i>', '', 'info');
        } else if (tamano < 1) {
            Swal.fire(
                "ALERTA!",
                "La imagen que se desea subir no cumple con lo solicitado.",
                "warning"
            );
        } else {
            var _this = this;
            var $form = $('#frmImage')[0];
            const datos = new FormData($form);
            datos.append("crud", "updateImg");
            datos.append("param", $param);
            $.ajax({
                url: 'json/ajax_empresa/empresa.php',
                type: 'post',
                data: datos,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function () {
                    $("#frmImage #spinnerButtonImage").show();
                    $("#frmImage #btnEmpresaImage").attr("disabled", true);
                },
                success: function (e) {
                    if (e.responseJson == "no server") {
                        Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                    } else if (e.responseJson == "error") {
                        Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                    } else if (e.responseJson == "no imagen") {
                        Swal.fire('Error!', 'El formato no es de imagen', 'error');
                        $('#imgBusiness').attr('accept', '.jpg, .jpeg, .png');
                    } else {
                        if (e.message == "Unauthenticated.") {
                            Swal.fire({
                                title: 'Parece que el token a sido eliminado',
                                text: "Haga clic en Aceptar para poder reestablecer el token!",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'logout';
                                }
                            });

                        } else if (e.status) {
                            if (e.message == "Actualización Imagen exitosa") {
                                toastr.info(e.message);
                                _this.deleteImg();
                            }
                        } else {
                            if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                Swal.fire({
                                    title: 'No se pudo conectar a la base de datos' + ' <i class="far fa-tired"></i>',
                                    text: "Haga clic en 'Aceptar' para salir del sistema",
                                    icon: 'info',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Aceptar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = 'logout';
                                    }
                                });
                            } else if (e.errors[0] == "mantenimiento.") {
                                Swal.fire({
                                    title: e.message + ' <i class="far fa-grin-beam-sweat"></i>',
                                    text: "Haga clic en 'Aceptar' para salir del sistema",
                                    icon: 'info',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Aceptar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = 'logout';
                                    }
                                });
                            }
                        }
                    }
                },
                error: function (error) {
                    Swal.fire('Error!', error.responseText, 'error');
                },
            }).done(function () {
                $("#frmImage #spinnerButtonImage").hide();
            });
        }
    }

    onEmpresaFormSubmit() {
        const datos = this.view.formEmpresa.serialize();
        const paramEmpl = this.view.formEmpresa.find('#param').val();
        if (paramEmpl == null || paramEmpl == "") {
            this.createOrUpdateEmpresa('create', datos);
        } else {
            this.createOrUpdateEmpresa('update', datos);
        }
    }

    createOrUpdateEmpresa(crud, formData) {
        var _this = this;  // Guardar referencia a la instancia actual
        // Realizar la solicitud AJAX para crear o actualizar la empresa
        $.ajax({
            url: 'json/ajax_empresa/empresa.php',
            type: 'post',
            data: formData + `&crud=${crud}`,
            dataType: 'json',
            beforeSend: function () {
                $("#frmEmpresa #spinnerButton").show();
                $("#frmEmpresa #btnEmpresa").attr("disabled", true);
            },
            success: function (e) {
                if (e.responseJson == "no server") {
                    Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                } else {
                    if (e.message == "Unauthenticated.") {
                        Swal.fire({
                            title: 'Parece que el token a sido eliminado',
                            text: "Haga clic en Aceptar para poder reestablecer el token!",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = 'logout';
                            }
                        });

                    } else if (e.status) {
                        if (e.message == "Registro Generado.") {
                            toastr.success(e.message);
                            _this.showBusiness();
                        } else if (e.message == "Actualización exitosa.") {
                            toastr.info(e.message);
                            _this.showBusiness();
                        }
                    } else {
                        if (e.errors[0] == "No se pudo conectar a la base de datos") {
                            Swal.fire({
                                title: 'No se pudo conectar a la base de datos' + ' <i class="far fa-tired"></i>',
                                text: "Haga clic en 'Aceptar' para salir del sistema",
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'logout';
                                }
                            });
                        } else if (e.errors[0] == "mantenimiento.") {
                            Swal.fire({
                                title: e.message + ' <i class="far fa-grin-beam-sweat"></i>',
                                text: "Haga clic en 'Aceptar' para salir del sistema",
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'logout';
                                }
                            });
                        } else {
                            if (e.alert == "rules") {
                                Swal.fire('Incorrecto!', e.errors[0], 'warning');
                            }
                        }
                    }
                }
            },
            error: function (error) {
                Swal.fire('Error!', error.responseText, 'error');
            },
        }).done(function () {
            $("#frmEmpresa #btnEmpresa").removeAttr("disabled");
            $("#frmEmpresa #spinnerButton").hide();
        });
    }

    showBusiness() {
        const formData = {
            crud: 'getEmpresa',
        };
        // Realizar la solicitud AJAX para mostrar detalles de la empresa
        // (Puedes completar este bloque según tus necesidades)
        $.ajax({
            url: 'json/ajax_empresa/empresa.php',
            type: 'post',
            data: formData,
            dataType: 'json',
        }).done(function (e) {
            if (e.message == "Unauthenticated.") {
                Swal.fire({
                    title: 'Parece que el token a sido eliminado',
                    text: "Haga clic en Aceptar para poder reestablecer el token!",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'logout';
                    }
                });

            } else {
                $('#frmEmpresa #param').val(e.id);
                $('#frmEmpresa #textruc').val(e.ruc);
                $('#frmEmpresa #textrazonsocial').val(e.razon_social);
                $('#frmEmpresa #textdireccion').val(e.address);
                $('#frmEmpresa #textdireccionfiscal').val(e.fiscal_address);
                $('#frmEmpresa #textcorreo').val(e.email);
                //$('#frmEmpresa #param').val(e.id);
                if (e.img_logo_empresa_name == null || e.img_logo_empresa_name == "") {
                    $("#img-preview").attr("src", 'views/assets/img/no_logo.jpg');
                } else {
                    $("#name-img").html(`${e.img_logo_empresa_name}`);
                    $("#img-preview").attr("src", `${e.img_logo_empresa_url}`);
                }

                $('#frmLocal #paramLocal').val(e.id);
            }
        }).fail(function (error) {
            Swal.fire('Error!', error.responseText, 'error');
        });
    }

    preview(e) {
        const url = e.target.files[0];
        const urlTmp = URL.createObjectURL(url);
        $("#img-preview").attr("src", urlTmp);
        $("#icon-image").addClass("d-none");
        $("#icon-cerrar").removeClass("d-none");
        $("#name-img").html(`${url['name']}`);
        $("#frmImage #btnEmpresaImage").removeAttr("disabled");
    }

    deleteImg() {
        var _this = this;
        $("#name-img").html('');
        $("#icon-cerrar").addClass('d-none');
        $("#icon-image").removeClass("d-none");
        $("#imgBusiness").val('');
        _this.showBusiness();
        _this.btnImageDisabled();
    }

    btnImageDisabled() {
        $("#frmImage #btnEmpresaImage").attr("disabled", true);
    }

    onLocalFormSubmit() {
        var $paramLocal = $("#frmLocal #paramLocal").val();
        if ($paramLocal == "" || $paramLocal == null) {
            Swal.fire('Necesitas llenar la Información de la empresa para ingresar sucursales', '', 'info');
        } else {
            $('#frmLocal').submit();
        }
    }
}