class RolesController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarRoles = this.actualizarRoles.bind(this);
        window.visualizarRoles = this.visualizarRoles.bind(this);
        window.eliminarRoles = this.eliminarRoles.bind(this);
        window.reingresarRoles = this.reingresarRoles.bind(this);
    }

    onCreateRolesFormSubmit() {
        const $datos = this.view.formRegistrarRoles.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_rol/rol.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarRoles #spinnerButton").show();
                $("#frmRegistrarRoles #btnRoles").attr("disabled", true);
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
                            self.tblListRoles.ajax.reload();
                            $("#frmRegistrarRoles")[0].reset();
                        } else {
                            if (e.message == "El valor ya existe en la base de datos.") {
                                toastr.warning(e.message);
                            }
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
                $("#frmRegistrarRoles #btnRoles").removeAttr("disabled");
                $("#frmRegistrarRoles #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarRoles #btnRoles").removeAttr("disabled");
            $("#frmRegistrarRoles #spinnerButton").hide();
        });
    }
    onUpdateRolesFormSubmit() {
        const $datos = this.view.formActualizarRoles.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_rol/rol.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function () {
                $("#frmActualizarRoles #spinnerButton").show();
                $("#frmActualizarRoles #btnRoles").attr("disabled", true);
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

                        if (e.message == "Actualización exitosa.") {
                            toastr.info(e.message);
                            self.tblListRoles.ajax.reload();
                            $("#actualizar-modal").modal('hide');
                            $("#frmActualizarRoles")[0].reset();
                        } else {
                            if (e.message == "El valor ya existe en la base de datos.") {
                                toastr.warning(e.message);
                            }
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
                $("#frmActualizarRoles #btnRoles").removeAttr("disabled");
                $("#frmActualizarRoles #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarRoles #btnRoles").removeAttr("disabled");
            $("#frmActualizarRoles #spinnerButton").hide();
        });
    }
    visualizarRoles(param) {
        $.ajax({
            url: "json/ajax_rol/rol.php",
            type: "post",
            data: { param: param, crud: "getIdInfo" },
            dataType: 'json',
            error: function (error) {
                Swal.fire('Error!', error.responseText, 'error');
            }
        }).done(function (e) {
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
                    $("#info-modal #sede").html(e.headquarters);
                    $("#info-modal #address").html(e.address);
                    if (e.phone == "" || e.phone == null) {
                        $("#info-modal #call1").html("--------");
                    } else {
                        $("#info-modal #call1").html(e.phone);
                    }
                    if (e.phone_2 == "" || e.phone_2 == null) {
                        $("#info-modal #call2").html("--------");
                    } else {
                        $("#info-modal #call2").html(e.phone_2);
                    }
                    if (e.phone_3 == "" || e.phone_3 == null) {
                        $("#info-modal #call3").html("--------");
                    } else {
                        $("#info-modal #call3").html(e.phone_3);
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
        });
    }
    actualizarRoles(param) {
        $.ajax({
            url: "json/ajax_rol/rol.php",
            type: "post",
            data: { param: param, crud: "listId" },
            dataType: 'json',
            error: function (error) {
                Swal.fire('Error!', error.responseText, 'error');
            }
        }).done(function (e) {
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
                    $("#frmActualizarRoles #param").val(e.id);
                    $("#frmActualizarRoles #textDescripcion").val(e.description);
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
        });
    }
    eliminarRoles(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Se inactivará el local seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_rol/rol.php",
                    type: "post",
                    data: { param: param, crud: "delete", enabled: 0 },
                    dataType: 'json',
                    error: function (error) {
                        Swal.fire('Error!', error.responseText, 'error');
                    }
                }).done(function (e) {
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
                            if (e.message == "Eliminación exitosa") {
                                Swal.fire(
                                    'Eliminado',
                                    'El rol paso a Inactivo',
                                    'success'
                                );
                                self.tblListRoles.ajax.reload();
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
                });
            } else {
                alertify.error('Canceló la operación');
            }
        });
    }
    reingresarRoles(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en reintegrar?',
            text: "Se reintegrará el local seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_rol/rol.php",
                    type: "post",
                    data: { param: param, crud: "delete", enabled: 1 },
                    dataType: 'json',
                    error: function (error) {
                        Swal.fire('Error!', error.responseText, 'error');
                    }
                }).done(function (e) {
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

                            if (e.message == "Eliminación exitosa") {
                                Swal.fire(
                                    'Reintegrado',
                                    'El rol paso a Activo',
                                    'success'
                                );
                                self.tblListRoles.ajax.reload();
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
                });
            } else {
                alertify.error('Canceló la operación');
            }
        });
    }
    listRoles() {
        this.tblListRoles = $('#tblListRoles').DataTable({
            ordering: false,
            stateSave: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                paginate: {
                    previous: '<',
                    next: '>'
                }
            },
            ajax: {
                url: "json/ajax_rol/listarRol.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'description' },
                { 'data': 'enabled' },
                { 'data': 'butonkeyvista' },
                { 'data': 'butonkeyoperacion' },
                { 'data': 'acciones' },
            ]
        });
    }
}