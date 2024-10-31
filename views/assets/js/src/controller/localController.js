class LocalController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarLocales = this.actualizarLocales.bind(this);
        window.visualizarLocales = this.visualizarLocales.bind(this);
        window.visualizarSeries = this.visualizarSeries.bind(this);
        window.eliminarLocales = this.eliminarLocales.bind(this);
        window.reingresarLocales = this.reingresarLocales.bind(this);
    }

    onCreateLocalesFormSubmit() {
        const $datos = this.view.formRegistrarLocal.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_local/local.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarLocal #spinnerButton").show();
                $("#frmRegistrarLocal #btnLocales").attr("disabled", true);
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
                            $("#frmRegistrarLocal")[0].reset();
                            $("#frmRegistrarLocal #selectSede").val(null).trigger('change');
                            self.tblListLocales.ajax.reload();
                        } else {
                            if (e.message == "El valor ya existe en la base de datos.") {
                                toastr.warning(e.message);
                            } else if (e.message == "Ya existe un local asignado como sede principal.") {
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
                $("#frmRegistrarLocal #btnLocales").removeAttr("disabled");
                $("#frmRegistrarLocal #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarLocal #btnLocales").removeAttr("disabled");
            $("#frmRegistrarLocal #spinnerButton").hide();
        });
    }
    onUpdateLocalesFormSubmit() {
        const $datos = this.view.formActualizarLocal.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_local/local.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function () {
                $("#frmActualizarLocal #spinnerButton").show();
                $("#frmActualizarLocal #btnLocales").attr("disabled", true);
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
                            $("#actualizar-modal").modal('hide');
                            $("#frmActualizarLocal #selectSede").val(null).trigger('change');
                            self.tblListLocales.ajax.reload();
                        } else {
                            if (e.message == "El valor ya existe en la base de datos.") {
                                toastr.warning(e.message);
                            } else if (e.message == "Ya existe un local asignado como sede principal.") {
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
                $("#frmActualizarLocal #btnLocales").removeAttr("disabled");
                $("#frmActualizarLocal #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarLocal #btnLocales").removeAttr("disabled");
            $("#frmActualizarLocal #spinnerButton").hide();
        });
    }
    visualizarLocales(param) {
        $.ajax({
            url: "json/ajax_local/local.php",
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
    actualizarLocales(param) {
        $.ajax({
            url: "json/ajax_local/local.php",
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
                    $("#frmActualizarLocal #param").val(e.id);
                    $("#frmActualizarLocal #selectSede").val(e.headquartersId).trigger('change');
                    $("#frmActualizarLocal #address").val(e.address);
                    $("#frmActualizarLocal #call1").val(e.phone);
                    $("#frmActualizarLocal #call2").val(e.phone_2);
                    $("#frmActualizarLocal #call3").val(e.phone_3);
                    if (e.main == 1) {
                        $('#CheckLocalPrincipal2').prop('checked', true);
                    } else {
                        $('#CheckLocalPrincipal2').prop('checked', false);
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
    eliminarLocales(param) {
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
                    url: "json/ajax_local/local.php",
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
                                    'El local paso a Inactivo',
                                    'success'
                                );
                                self.tblListLocales.ajax.reload();
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
    reingresarLocales(param) {
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
                    url: "json/ajax_local/local.php",
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
                                    'El local paso a Activo',
                                    'success'
                                );
                                self.tblListLocales.ajax.reload();
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
    listLocales() {
        this.tblListLocales = $('#tblListLocales').DataTable({
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
                url: "json/ajax_local/listarLocal.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'headquarters.description' },
                { 'data': 'direccion' },
                { 'data': 'series' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }
    onCreateCorrelativoLocalFormsubmit() {
        const $datos = this.view.formRegistrarCorrelativoLocal.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_correlativolocal/correlativoLocal.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarCorrelativoLocal #spinnerButton").show();
                $("#frmRegistrarCorrelativoLocal #btnCorrelativoLocal").attr("disabled", true);
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
                            $("#frmRegistrarCorrelativoLocal")[0].reset();
                            $("#frmRegistrarCorrelativoLocal #selectDocumentoventa").val(null).trigger('change');
                            $("#frmRegistrarCorrelativoLocal #selectSerie").val(null).trigger('change');
                            self.tblListCorrelativoLocal.ajax.reload();
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
                $("#frmRegistrarCorrelativoLocal #btnCorrelativoLocal").removeAttr("disabled");
                $("#frmRegistrarCorrelativoLocal #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarCorrelativoLocal #btnCorrelativoLocal").removeAttr("disabled");
            $("#frmRegistrarCorrelativoLocal #spinnerButton").hide();
        });
    }
    visualizarSeries(param, address, headquarters) {
        $('#frmRegistrarCorrelativoLocal #param').val(param);
        $('#info-series #correlativolocalModalLabel').html("Series de la sede: " + headquarters + " || " + address);
        // Destruye la tabla
        $('#tblListCorrelativoLocal').DataTable().clear();
        $('#tblListCorrelativoLocal').DataTable().destroy();
        this.tblListCorrelativoLocal = $('#tblListCorrelativoLocal').DataTable({
            ordering: false,
            //stateSave: true,
            lengthMenu: [3, 5, 10],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                paginate: {
                    previous: '<',
                    next: '>'
                }
            },
            ajax: {
                url: "json/ajax_correlativolocal/listarCorrelativoLocal.php",
                type: "POST",
                data: { param: param },
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'correlative.documentsales.description' },
                { 'data': 'correlative.serie' },
                { 'data': 'correlative.correlative' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }
}