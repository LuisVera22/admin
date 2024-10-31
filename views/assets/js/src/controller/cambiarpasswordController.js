class CambiarpasswordController {
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }

    onChangePasswordFormSubmit() {
        const $datos = this.view.formChangePassword.serialize();
        const newPassword = $("#textNuevoPassword").val();
        const confirmPassword = $("#textConfirmarPassword").val();

        if (newPassword !== confirmPassword) {
            Swal.fire('No Coinciden', 'La nueva contraseña no coincide con el campo "Confirmar Contraseña".', 'warning');
        } else {
            Swal.fire({
                title: 'Cambio de Contraseña',
                text: "Desea cambiar tu contraseña?, haga clic en 'Si' para continuar con el cambio.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cambiar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "json/ajax_cambiarpassword/cambiarpassword.php",
                        type: "POST",
                        data: $datos + '&crud=send',
                        dataType: 'json',
                        beforeSend: function() {
                            $("#frmChangePassword #spinnerCambiarPassword").show();
                            $("#frmChangePassword #btnCambiarPassword").attr("disabled", true);
                        },
                        success: function (e) {
                            if (e.responseJson == "no server") {
                                Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                            } else if (e.responseJson == "error") {
                                Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                            } else {
                                if (e.status) {
                                    if (e.message == "Actualización exitosa.") {
                                        Swal.fire('Éxito!', 'La contraseña fue cambiada con éxito. Favor de revisar tu correo.', 'success').then(() => {                                            
                                            location.href = 'login';
                                        });        
                                    } else {
                                        Swal.fire( e.message,'', 'warning');
                                    }
                                } else {
                                    if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                        Swal.fire({
                                            title: 'No se pudo conectar a la base de datos' + '<i class="far fa-tired"></i>',
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
                                            title: e.message + '<i class="far fa-grin-beam-sweat"></i>',
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
                        error: function (e) {
                            Swal.fire('Error', 'Algo salió mal: ' + e.responseText, 'error');
                        }
                    }).done(function() {
                        $("#frmChangePassword #btnCambiarPassword").removeAttr("disabled");
                        $("#frmChangePassword #spinnerCambiarPassword").hide();
                    });
                } else {
                    alertify.error('Canceló la operación');
                }
            });

        }


    }
}