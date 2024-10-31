class ClienteController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarCliente = this.actualizarCliente.bind(this);
        window.visualizarCliente = this.visualizarCliente.bind(this);
        window.eliminarCliente = this.eliminarCliente.bind(this);
        window.reingresarCliente = this.reingresarCliente.bind(this);
    }

    onCreateClienteFormSubmit() {
        const $datos = this.view.formRegistrarCliente.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_cliente/cliente.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarCliente #spinnerButton").show();
                $("#frmRegistrarCliente #btnCliente").attr("disabled", true);
            },
            success: function (e) {
                if (e.responseJson == "no server") {
                    Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                } else if (e.responseJson == "no ruc") {
                    Swal.fire('Aviso!', 'El RUC debe contener 11 dígitos', 'warning');
                } else if (e.responseJson == "no dni") {
                    Swal.fire('Aviso!', 'El DNI debe contener 8 dígitos', 'warning');
                } else if (e.responseJson == "no cliente") {
                    Swal.fire('Aviso!', 'Se debe digitar el cliente al que pertenece el número de documento', 'warning');
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
                            self.tblListCliente.ajax.reload();
                            $("#frmRegistrarCliente")[0].reset();
                            $("#frmRegistrarCliente #selectTipoDocumento").val(null).trigger('change');
                        } else {
                            if (e.message == "El documento ya se encuentra registrado.") {
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
                        } else if (e.errors[0] == "Error al crear el registro.") {
                            Swal.fire('Incorrecto!', e.message, 'warning');
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
                $("#frmRegistrarCliente #btnCliente").removeAttr("disabled");
                $("#frmRegistrarCliente #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarCliente #btnCliente").removeAttr("disabled");
            $("#frmRegistrarCliente #spinnerButton").hide();
        });
    }
    onUpdateClienteFormSubmit() {
        const $datos = this.view.formActualizarCliente.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_cliente/cliente.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function () {
                $("#frmActualizarCliente #spinnerButton").show();
                $("#frmActualizarCliente #btnCliente").attr("disabled", true);
            },
            success: function (e) {
                if (e.responseJson == "no server") {
                    Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                } else if (e.responseJson == "no ruc") {
                    Swal.fire('Aviso!', 'El RUC debe contener 11 dígitos', 'warning');
                } else if (e.responseJson == "no dni") {
                    Swal.fire('Aviso!', 'El DNI debe contener 8 dígitos', 'warning');
                } else if (e.responseJson == "no cliente") {
                    Swal.fire('Aviso!', 'Se debe digitar el cliente al que pertenece el número de documento', 'warning');
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
                            self.tblListCliente.ajax.reload();
                            $("#actualizar-modal").modal('hide');
                            $("#frmActualizarCliente #selectTipoDocumento").val(null).trigger('change');
                            $('#frmActualizarCliente')[0].reset();
                        } else {
                            if (e.message == "El documento ya se encuentra registrado.") {
                                toastr.warning(e.message);
                            } else {
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
                        } else if (e.errors[0] == "Error al crear el registro.") {
                            Swal.fire('Error!', e.errors[0] + ' ' + e.message, 'error');
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
                $("#frmActualizarCliente #btnCliente").removeAttr("disabled");
                $("#frmActualizarCliente #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarCliente #btnCliente").removeAttr("disabled");
            $("#frmActualizarCliente #spinnerButton").hide();
        });
    }
    actualizarCliente(param) {
        $.ajax({
            url: "json/ajax_cliente/cliente.php",
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
                    $("#frmActualizarCliente #param").val(e.id);
                    $("#frmActualizarCliente #selectTipoDocumento").val(e.typedocumentId).trigger('change');
                    $("#frmActualizarCliente #textNDocumento").val(e.number_document);
                    $("#frmActualizarCliente #textNombre").val(e.names);
                    $("#frmActualizarCliente #textApellido").val(e.lastnames);
                    $("#frmActualizarCliente #textRazonSocial").val(e.bussinesnames);
                    $("#frmActualizarCliente #textNombreComercial").val(e.tradename);
                    $("#frmActualizarCliente #textCorreo").val(e.email);
                    $("#frmActualizarCliente #textContacto").val(e.cell_phone);
                    $("#frmActualizarCliente #textDireccion").val(e.address);
                    $("#frmActualizarCliente #textDireccionFiscal").val(e.address_fiscal);
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
    visualizarCliente(param) {
        $.ajax({
            url: "json/ajax_cliente/cliente.php",
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
                    $("#info-modal #selectTipoDocumento").html(e.typedocument);
                    $("#info-modal #textNDocumento").html(e.number_document);
                    $("#info-modal #textPersonal").html(e.personal);

                    if (e.tradename == "" || e.tradename == null) {
                        $("#info-modal #textNombreComercial").html("--------");
                    } else {
                        $("#info-modal #textNombreComercial").html(e.tradename);
                    }
                    if (e.email == "" || e.email == null) {
                        $("#info-modal #textCorreo").html("--------");
                    } else {
                        $("#info-modal #textCorreo").html(e.email);
                    }
                    if (e.cell_phone == "" || e.cell_phone == null) {
                        $("#info-modal #textContacto").html("--------");
                    } else {
                        $("#info-modal #textContacto").html(e.cell_phone);
                    }
                    if (e.address == "" || e.address == null) {
                        $("#info-modal #textDireccion").html("--------");
                    } else {
                        $("#info-modal #textDireccion").html(e.address);
                    }
                    if (e.address_fiscal == "" || e.address_fiscal == null) {
                        $("#info-modal #textDireccionFiscal").html("--------");
                    } else {
                        $("#info-modal #textDireccionFiscal").html(e.address_fiscal);
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
    eliminarCliente(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Se inactivará el Cliente seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_cliente/cliente.php",
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
                                    'El cliente paso a Inactivo',
                                    'success'
                                );
                                self.tblListCliente.ajax.reload();
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
    reingresarCliente(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en reintegrar?',
            text: "Se reintegrará el Cliente seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_cliente/cliente.php",
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
                                    'El cliente paso a Activo',
                                    'success'
                                );
                                self.tblListCliente.ajax.reload();
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
    listCliente() {
        this.tblListCliente = $('#tblListCliente').DataTable({
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
                url: "json/ajax_cliente/listarCliente.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'codigo' },
                { 'data': 'personal' },
                { 'data': 'typedocument.description' },
                { 'data': 'number_document' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }
}