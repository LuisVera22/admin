class ProveedorController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarProveedor = this.actualizarProveedor.bind(this);
        window.visualizarProveedor = this.visualizarProveedor.bind(this);
        window.eliminarProveedor = this.eliminarProveedor.bind(this);
        window.reingresarProveedor = this.reingresarProveedor.bind(this);
    }
    onCreateProveedorFormSubmit() {
        const $datos = this.view.formRegistrarProveedor.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_proveedor/proveedor.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarProveedor #spinnerButton").show();
                $("#frmRegistrarProveedor #btnProveedor").attr("disabled", true);
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
                            self.tblListProveedor.ajax.reload();
                            $("#frmRegistrarProveedor")[0].reset();
                            $("#frmRegistrarProveedor #textNDocumento").val(null).trigger('change');
                            $("#frmRegistrarProveedor #textRazonSocial").val(null).trigger('change');
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
                        } else if (e.errors[0] == "mantenimiento") {
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
                $("#frmRegistrarProveedor #btnProveedor").removeAttr("disabled");
                $("#frmRegistarProveedor #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarProveedor #btnProveedor").removeAttr("disabled");
            $("#frmRegistrarProveedor #spinnerButton").hide();

        });
    }
    onUpdateProveedorFormSubmit() {
        const $datos = this.view.formActualizarProveedor.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_proveedor/proveedor.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function () {
                $("#frmActualizarProveedor #spinnerButton").show();
                $("#frmActualizarProveedor #btnProveedor").attr("disabled", true);
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
                            text: "Haga click en Aceptar para poder restablecer el Token",
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
                            $("#actualizar-modal").modal('hide');                            
                            $('#frmActualizarProveedor')[0].reset();
                            self.tblListProveedor.ajax.reload();
                        } else {
                            if (e.message == "El valor ya existe en la base de datos.") {
                                toastr.warning(e.message);
                            } else {
                                toastr.warning(e.message);
                            }
                        }
                    } else {
                        if (e.errors[0] == "No se pudo conectar a la base de datos.") {
                            Swal.fire({
                                title: 'No se pudo conectar a la base de datos' + '<i class="far fa-tired"></i>',
                                text: "Haga click en 'Aceptar' para salir del sistema.",
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
                                text: "Haga click en 'Aceptar' para salir del sistema.",
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
                $("#frmActualizarProveedor #btnProveedor").removeAttr("disabled");
                $("#frmActualizarProveedor #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarProveedor #btnProveedor").removeAttr("disabled");
            $("#frmActualizarProveedor #spinnerButton").hide();

        });
    }
    visualizarProveedor(param) {
        $.ajax({
            url: "json/ajax_proveedor/proveedor.php",
            type: "post",
            data: { param: param, crud: "getIdInfo" },
            dataType: 'json',
            error: function (error) {
                Swal.fire('Error!', error.responseText, 'error');
            }
        }).done(function (e) {
            if (e.responseJson == "no server") {
                Swal.fire('Error', 'Se perdió la conexión', 'error');
            } else if (e.responseJson == "error") {
                Swal.fire('Error', 'Error en la solicitud AJAX', 'error');
            } else {
                if (e.message == "Unauthenticated.") {
                    Swal.fire({
                        title: 'Parece que el token ha sido eliminado',
                        text: "Haga clic en Aceptar para restablecer el token",
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
                    $("#info-modal #textNDocumento").html(e.number_document);
                    $("#info-modal #textRazonSocial").html(e.bussinesname);
                    if (e.address == "" || e.address == null) {
                        $("#info-modal #textDireccion").html("------");
                    } else {
                        $("#info-modal #textDireccion").html(e.address);
                    }
                    if (e.email == "" || e.email == null) {
                        $("#info-modal #textCorreo").html("------");
                    } else {
                        $("#info-modal #textCorreo").html(e.email);
                    }
                    if (e.cell_phone == "" || e.cell_phone == null) {
                        $("#info-modal #textNumeroCelular").html("------");
                    } else {
                        $("#info-modal #textNumeroCelular").html(e.cell_phone);
                    }
                    if (e.contact == "" || e.contact == null) {
                        $("#info-modal #textContacto").html("------");
                    } else {
                        $("#info-modal #textContacto").html(e.contact);
                    }
                } else {
                    if (e.errors[0] == "No se pudo conectar a la base de datos") {
                        Swal.fire({
                            title: 'No se pudo conectar a la base de datos',
                            text: "Haga clic en Aceptar para salir del sistema",
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
                            title: e.message,
                            text: "Haga clic en Aceptar para salir del sistema",
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
    actualizarProveedor(param) {
        $.ajax({
            url: "json/ajax_proveedor/proveedor.php",
            type: "post",
            data: { param: param, crud: "listId" },
            dataType: 'json',
            error: function (error) {
                Swal.fire('Error!', error.responseText, 'error');
            }
        }).done(function (e) {
            if (e.responseJson == "no server") {
                Swal.fire('Error!', 'se perdio la conexión con el servidor', 'error');
            } else if (e.responseJson == "error") {
                Swal.fire('Error!', 'Error', 'Error en la solicitud AJAX', 'error');
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
                    $("#frmActualizarProveedor #param").val(e.id);
                    $("#frmActualizarProveedor #textNDocumento").val(e.number_document);
                    $("#frmActualizarProveedor #textRazonSocial").val(e.bussinesname);
                    $("#frmActualizarProveedor #textDireccion").val(e.address);
                    $("#frmActualizarProveedor #textCorreo").val(e.email);
                    $("#frmActualizarProveedor #textNumeroCelular").val(e.cell_phone);
                    $("#frmActualizarProveedor #textContacto").val(e.contact);

                } else {
                    if (e.errors[0] == "No se pudo conectar a la base de datos") {
                        Swal.fire({
                            title: 'No se pudo conectar a la base de datos' + '<i class="far fa-tired"></i>',
                            text: "Haga click en Aceptar para salir del sistema",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = `logout`;
                            }
                        });
                    } else if (e.errors[0] == "mantenimiento") {
                        Swal.fire({
                            title: e.message + '<i class="far fa-grin-beam-sweat"></i>',
                            text: "Haga click en Aceptar para salir del sistema",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d5',
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
    eliminarProveedor(param) {
        const self = this;
        Swal.fire({
            title: 'Estas seguro en eliminar?',
            text: "Se inactivara el Proveedor selecionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_proveedor/proveedor.php",
                    type: "post",
                    data: { param: param, crud: "delete", enabled: 0 },
                    dataType: 'json',
                    error: function (error) {
                        Swal.fire('Error!', error.responseText, 'error');
                    }
                }).done(function (e) {
                    if (e.responseJson == "no server") {
                        Swal.fire('Error!', 'se perdio la conexion con el servidor', 'error');
                    } else if (e.responseJson == "error") {
                        Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                    } else {
                        if (e.message == "Unauthenicated.") {
                            Swal.fire({
                                title: 'Parece que el token a sido eliminado',
                                text: "Haga click en Aceptar para poder reestablecer el token!",
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
                                    'El proveedor paso a Inactivo',
                                    'success'
                                );
                                self.tblListProveedor.ajax.reload();
                            }
                        } else {
                            if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                Swal.fire({
                                    title: 'No se pudo conectar a la base de datos' + '<i class="far fa-tired"></i>',
                                    text: "Haga click en Aceptar para salir del sistema",
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
                                    title: e.message + '<i class="far fa-grin-bean.sweat"></i>',
                                    text: "Haga click en Aceptar para salir del sistema",
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
    reingresarProveedor(param) {
        const self = this;
        Swal.fire({
            title: 'Estas seguro en reintegrar?',
            text: "Se reintegrará el Proveedor selecciondo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_proveedor/proveedor.php",
                    type: "post",
                    data: { param: param, crud: "delete", enabled: 1 },
                    dataType: 'json',
                    error: function (error) {
                        Swal.fire('Error!', error.responseText, 'error');
                    }
                }).done(function (e) {
                    if (e.responseJson == "no server") {
                        Swal.fire('Error!', 'se perdio la conexión con el servidor', 'error');
                    } else if (e.responseJson == 'error') {
                        Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                    } else {
                        if (e.message == "Unauthenticated.") {
                            Swal.fire({
                                title: 'Parece que el token a sido eliminado',
                                text: "Haga click en Aceptar para poder restablecer el token",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: 'Aceptar',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'logout';
                                }
                            });
                        } else if (e.status) {

                            if (e.message == "Eliminación exitosa") {
                                Swal.fire(
                                    'Reintegrado',
                                    'El proveedor paso a activo',
                                    'success'
                                );
                                self.tblListProveedor.ajax.reload();
                            }
                        } else {
                            if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                Swal.fire({
                                    title: 'No se pudo conectar a la base de datos' + '<i class="far fa-tired></i>',
                                    text: "Haga click en Aceptar para salir del sistema",
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
                                    title: e.message + '<i class = "far fa-grin-bean-sweat"></i>',
                                    text: "Haga click en Aceptar para salir del sistema",
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
                })
            } else {
                alertify.error('Canceló la operación');
            }
        });
    }
    listProveedor() {
        this.tblListProveedor = $('#tblListProveedor').DataTable({
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
                url: "json/ajax_proveedor/listarProveedor.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'number_document' },
                { 'data': 'bussinesname' },
                { 'data': 'address' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }
}