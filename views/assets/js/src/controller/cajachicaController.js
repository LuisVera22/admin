class CajachicaController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarCajachica = this.actualizarCajachica.bind(this);
        window.visualizarCajachica = this.visualizarCajachica.bind(this);
        window.eliminarCajachica = this.eliminarCajachica.bind(this);
    }

    onCreateCajachicaFormSubmit() {
        const $datos = this.view.formRegistrarCajachica.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_cajachica/cajachica.php',
            type: 'post',
            data: $datos + '&crud=create',
            dataType: 'json',
            beforeSend: function(){
                $("#frmRegistrarCajachica #spinnerButton").show();
                $("#frmRegistrarCajachica #btnCajachica").attr("disabled",true);
            },
            success: function(e) {
                if(e.responseJson == "no server") {
                    Swal.fire('Error!','se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!','Error en la solicitud AJAX','error');
                } else {
                    if (e.message == "Unauthenticated.") {
                        Swal.fire({
                            title: 'Parece que el token a sido eliminado',
                            text: "Haga click en Aceptar para poder restablece el token!",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location  = 'logout';
                            }
                        }); 
                    } else if (e.status) {
                        if(e.message == "Registro Generado.") {
                            toastr.success(e.message);
                            self.tblListCajachica.ajax.reload();
                            $("#frmRegistrarCajachica")[0].reset();
                        }
                    } else {
                        if (e.errors[0] == "No se pudo conectar a la base de datos"){
                            Swal.fire({
                                title: 'No se pudo conectar a la base de datos' + ' <i class="far fa-tired"></i>',
                                text: "Haga clic en 'Aceptar' para salir del sistema",
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar',
                            }).then((result)=>{
                                if (result.isConfirmed){
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
            error: function(error) {
                Swal.fire('Error!', error.responseText, 'error');
                $("#frmRegistrarCajachica #btnCajachica").removeAttr("disabled");
                $("#frmRegistrarCajachica #spinnerButton").hide();
            },
        }).done(function() {
            $("#frmRegistrarCajachica #btnCajachica").removeAttr("disabled");
            $("#frmRegistrarCajachica #spinnerButton").hide();
        });
    }
    onUpdateCajachicaFormSubmit() {
        const $datos = this.view.formActualizarCajachica.serialize();
        const self = this;
        $.ajax({
            url: 'json/ajax_cajachica/cajachica.php',
            type: 'post',
            data: $datos + '&crud=update',
            dataType: 'json',
            beforeSend: function() {
                $("#frmActualizarCajachica #spinnerButton").show();
                $("#frmActualizarCajachica #btnCajachica").attr("disabled", true);
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
                            self.tblListCliente.ajax.reload();
                            $("#actualizar-modal").modal('hide');
                            $('#frmActualizarCajachica')[0].reset();
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
                $("#frmActualizarCajachica #btnCajachica").removeAttr("disabled");
                $("#frmActualizarCajachica #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmActualizarCajachica #btnCajachica").removeAttr("disabled");
            $("#frmActualizarCajachica #spinnerButton").hide();
        });
    }
    actualizarCajachica(param) {
        $.ajax({
            url: "json/ajax_cajachica/cajachica.php",
            type: "post",
            data: {param:param,crud:"listId"},
            dataType: 'json',
            error: function(error) {
                Swal.fire('Error!',error.responseText, 'error');
            }
        }).donde(function (e){
            if (e.responseJson == "no server") {
                Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
            } else if (e.responseJson == "error") {
                Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
            } else {
                if(e.message == "Unauthenticated."){
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
                } else if (e.status){
                    $("#frmActualizarCajachica #param").val(e.id);
                    $("#frmActualizarCajachica #textDescripcion").val(e.description);
                    $("#frmActualizarCajachica #textMonto").val(e.amount);
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
    visualizarCajachica(param) {
        $.ajax({
            url: "json/ajax_cajachica/cajachica.php",
            type: "post",
            data: {param:param,crud:"getIdInfo"},
            dataType: 'json',
            error: function(error) {
                Swal.fire('Error!',error.responseText, 'error');
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
                    if (e.date == "" || e.date == null){
                        $("#info-modal #textFecha").html("--------");
                    } else {
                        $("#info-modal #textFecha").html(e.date);
                    }

                    if (e.time == "" || e.time == null) {
                        $("#info-modal #textHora").html("--------");
                    } else {
                        $("#info-modal #textHora").html(e.time);
                    }

                    if (e.description == "" || e.description == null) {
                        $("#info-modal #textDescripcion").html("--------");
                    } else {
                        $("#info-modal #textDescripcion").html(e.description);
                    }

                    if (e.amount == "" || e.amount == null) {
                        $("#info-modal #textMonto").html("--------");
                    } else {
                        $("#info-modal #textMonto").html(e.amount);
                    }

                    if (e.username == "" || e.username == null) {
                        $("#info-modal #textUsuario").html("--------");
                    } else {
                        $("#info-modal #textUsuario").html(e.username);
                    }

                    if (e.img_petty_cash_name == "" || e.img_petty_cash_name == null) {
                        $("#info-modal #imgCajachica").html("--------");
                    } else {
                        $("#info-modal #imgCajachica").html(e.img_petty_cash_name);
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
    eliminarCajachica(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Este registro será eliminado de forma permanente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_cajachica/cajachica.php",
                    type: "post",
                    data: { param: param, crud: "delete", enabled: 0 },
                    dataType: 'json',
                    error: function (error) {
                        Swal.fire('Error!', error.responseText, 'error');
                    }
                }).done(function(e){
                    if (e.responseJson == "no server"){
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
                                    'El registro fué eliminado permanentemente',
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
    listCajachica() {
        this.tblListCajachica = $('#tblListCajachica').DataTable({
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
                url: "json/ajax_cajachica/listarCajachica.php",
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                {'data': 'date'},
                {'data': 'time'},
                {'data': 'description'},
                {'data': 'amount'},
                {'data': 'username'},
                {'data': 'acciones'}
            ]
        });
    }
}