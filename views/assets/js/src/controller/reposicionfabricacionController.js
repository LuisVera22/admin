class ReposicionFabricacionController{
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }

    onCreateReposicionDigitalFormSubmit(){
        const self = this;

        $("#frmRegistrarReposicionDigital #selectTrabajo").attr("disabled", false);
        $("#frmRegistrarReposicionDigital #selectManufactura").attr("disabled", false);

        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));
        const $datos = this.view.formRegistrarReposicionDigital.serialize();

        $("#frmRegistrarReposicionDigital #selectTrabajo").attr("disabled", true);
        $("#frmRegistrarReposicionDigital #selectManufactura").attr("disabled", true);

        $.ajax({
            url: 'json/ajax_reposicion/reposicion.php',
            type: 'post',
            data: $datos + '&crud=createDig&idstore=' + localPrincipal.idstore,
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarReposicionDigital #spinnerButton").show();
                $("#frmRegistrarReposicionDigital #btnReposicion").attr("disabled", true);
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
                            self.tblListReposicionDigital.ajax.reload();
                            $('#frmRegistrarReposicionDigital #selectCodigoProducto').val('').trigger('change');
                            $("#frmRegistrarReposicionDigital")[0].reset();
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
                $("#frmRegistrarReposicionDigital #btnReposicion").removeAttr("disabled");
                $("#frmRegistrarReposicionDigital #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarReposicionDigital #btnReposicion").removeAttr("disabled");
            $("#frmRegistrarReposicionDigital #spinnerButton").hide();
        });
    }

    onCreateReposicionConvencionalFormSubmit(){
        const self = this;

        $("#frmRegistrarReposicionConvencional #selectTrabajo").attr("disabled", false);
        $("#frmRegistrarReposicionConvencional #selectManufactura").attr("disabled", false);

        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));
        const $datos = this.view.formRegistrarReposicionConvencional.serialize();

        $("#frmRegistrarReposicionConvencional #selectTrabajo").attr("disabled", true);
        $("#frmRegistrarReposicionConvencional #selectManufactura").attr("disabled", true);

        $.ajax({
            url: 'json/ajax_reposicion/reposicion.php',
            type: 'post',
            data: $datos + '&crud=createConv&idstore=' + localPrincipal.idstore,
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarReposicionConvencional #spinnerButton").show();
                $("#frmRegistrarReposicionConvencional #btnReposicion").attr("disabled", true);
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
                            self.tblListReposicionConvencional.ajax.reload();
                            $('#frmRegistrarReposicionConvencional #selectCodigoProductoConv').val('').trigger('change');
                            $("#frmRegistrarReposicionConvencional")[0].reset();
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
                $("#frmRegistrarReposicionConvencional #btnReposicion").removeAttr("disabled");
                $("#frmRegistrarReposicionConvencional #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarReposicionConvencional #btnReposicion").removeAttr("disabled");
            $("#frmRegistrarReposicionConvencional #spinnerButton").hide();
        });
    }

    tblReposicionDigital(){
        const selectStock = $('#frmRegistrarReposicionDigital #selectManufactura').val();

        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));

        let dataSend = {};

        if (localPrincipal === null) {
            dataSend = { manufactura: selectStock, sede: 0, listar: 'listDigital' };
        } else {
            dataSend = { manufactura: selectStock, sede: localPrincipal.idstore, listar: 'listDigital' };
        }

        this.tblListReposicionDigital = $('#tblListReposicionDigital').DataTable({
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
                url: "json/ajax_reposicion/listarReposicion.php",
                type: "POST",
                data: dataSend,
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'storehousexstore.storehouse.codigo' },
                { 'data': 'codigoquotation' },
                { 'data': 'description' },
                { 'data': 'replacementmount' },
                { 'data': 'storehousexstore.store.address' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }

    tblReposicionConvencional(){
        const selectStock = $('#frmRegistrarReposicionConvencional #selectManufactura').val();

        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));

        let dataSend = {};

        if (localPrincipal === null) {
            dataSend = { manufactura: selectStock, sede: 0, listar: 'listConvencional' };
        } else {
            dataSend = { manufactura: selectStock, sede: localPrincipal.idstore, listar: 'listConvencional' };
        }

        this.tblListReposicionConvencional = $('#tblListReposicionConvencional').DataTable({
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
                url: "json/ajax_reposicion/listarReposicion.php",
                type: "POST",
                data: dataSend,
                dataSrc: ''
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'storehousexstore.storehouse.codigo' },
                { 'data': 'codigoquotation' },
                { 'data': 'description' },
                { 'data': 'replacementmount' },
                { 'data': 'storehousexstore.store.address' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }

    eliminarReposicion(param, param2) {
        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));
        const self = this;
        Swal.fire({
            title: 'Estás por anular la reposición?',
            text: "Al anular esta reposición el monto que se repuso se descontará del almacen y la operación no se podrá reactivar, ¿desea continuar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, anular',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_reposicion/reposicion.php",
                    type: "post",
                    data: { param: param, param2: param2, param3:localPrincipal.idstore, crud: "delete", enabled: 0 },
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
                            if (e.message == "Eliminación exitosa.") {
                                Swal.fire(
                                    'Anulado',
                                    'La reposición ha sido anulada y el monto a reponer ha sido retirado del almacén',
                                    'success'
                                );
                                self.tblReposicionStock.ajax.reload();
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

    visualizarReposicion(param){
        $.ajax({
            url: "json/ajax_reposicion/reposicion.php",
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
                    $("#info-modal #textMotivo").html(e.description);                    
                    $("#info-modal #textTiempo").html(e.datetime);
                    $("#info-modal #textMonto").html(e.replacementmount);
                    $("#info-modal #textCodidoProducto").html(e.codigoProduct);
                    $("#info-modal #textProducto").html(e.product);
                    $("#info-modal #textCodigoOrden").html(e.codigo);
                    $("#info-modal #textCliente").html(e.client);
                    $("#info-modal #textSede").html(e.address);
                    $("#info-modal #textTipoManufacturacion").html(e.typemanufacturing);
                    $("#info-modal #textDetalle").html(e.descripciontotal);
                    $("#info-modal #textVendedor").html(e.vendor);
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
}