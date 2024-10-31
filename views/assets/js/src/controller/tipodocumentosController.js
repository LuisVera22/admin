class TipodocumentosController{
    constructor(model,view){
        this.model = model;
        this.view = view;

        window.actualizarTipoDocumentos = this.actualizarTipoDocumentos.bind(this);
        window.eliminarTipoDocumentos = this.eliminarTipoDocumentos.bind(this);
        window.reingresarTipoDocumentos = this.reingresarTipoDocumentos.bind(this);
    }    

    onCreateTipoDocumentoFormSubmit(){
        const $datos = this.view.formRegistrartipodocumento.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_tipodocumento/tipoDocumento.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarDocumentoIdentidad #spinnerButton").show();
                $("#frmRegistrarDocumentoIdentidad #btnDocumentoIdentidad").attr("disabled", true);
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
                            self.tblListTipoDocumento.ajax.reload();
                            $("#frmRegistrarDocumentoIdentidad")[0].reset();
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
                $("#frmRegistrarDocumentoIdentidad #btnDocumentoIdentidad").removeAttr("disabled");
                $("#frmRegistrarDocumentoIdentidad #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarDocumentoIdentidad #btnDocumentoIdentidad").removeAttr("disabled");
            $("#frmRegistrarDocumentoIdentidad #spinnerButton").hide();            
        });
    }
    onUpdateTipoDocumentoFormSubmit(){
        const $datos = this.view.formActualizartipodocumento.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_tipodocumento/tipoDocumento.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function () {
                $("#frmActualizarDocumentoIdentidad #spinnerButton").show();
                $("#frmActualizarDocumentoIdentidad #btnDocumentoIdentidad").attr("disabled", true);
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
                            self.tblListTipoDocumento.ajax.reload();
                            $("#actualizar-modal").modal('hide');
                            $("#frmActualizarDocumentoIdentidad")[0].reset();
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
                $("#frmActualizarDocumentoIdentidad #btnDocumentoIdentidad").removeAttr("disabled");
                $("#frmActualizarDocumentoIdentidad #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarDocumentoIdentidad #btnDocumentoIdentidad").removeAttr("disabled");
            $("#frmActualizarDocumentoIdentidad #spinnerButton").hide();            
        });
    }
    listTipoDocumentos(){
        this.tblListTipoDocumento = $('#tblListTipoDocumento').DataTable({
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
                url: "json/ajax_tipodocumento/listarTipoDocumento.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'description' },
                { 'data': 'code_sunat' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }
    actualizarTipoDocumentos(param){
        $.ajax({
            url: "json/ajax_tipodocumento/tipoDocumento.php",
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
                    $("#frmActualizarDocumentoIdentidad #param").val(e.id);
                    $("#frmActualizarDocumentoIdentidad #textDescripcion").val(e.description);
                    $("#frmActualizarDocumentoIdentidad #textCodigoSunat").val(e.code_sunat);
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
    eliminarTipoDocumentos(param){
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Se inactivará el documento de identidad seleccionda",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_tipodocumento/tipoDocumento.php",
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
                                    'El documento de identidad paso a Inactivo',
                                    'success'
                                );
                                self.tblListTipoDocumento.ajax.reload();
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
    reingresarTipoDocumentos(param){
        const self = this;
        Swal.fire({
            title: 'Estás seguro en reintegrar?',
            text: "Se reintegrará el documento de identidad seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_tipodocumento/tipoDocumento.php",
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
                                    'El documento de identidad paso a Activo',
                                    'success'
                                );
                                self.tblListTipoDocumento.ajax.reload();
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
}