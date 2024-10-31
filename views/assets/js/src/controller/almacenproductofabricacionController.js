class AlmacenproductofabricacionController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.eliminarAlmacenProducto = this.eliminarAlmacenProducto.bind(this);
        window.reingresarAlmacenProducto = this.reingresarAlmacenProducto.bind(this);
    }

    onCreateAlmacenProductFabricacionDigitalFormSubmit() {
        const self = this;
        $("#frmRegistrarAlmacenProductosFabricacionDig #selectTrabajo").attr("disabled", false);
        $("#frmRegistrarAlmacenProductosFabricacionDig #selectManufacturaDig").attr("disabled", false);
        const $datos = this.view.formRegistrarAlmacenProductosFabricacionDig.serialize();
        $("#frmRegistrarAlmacenProductosFabricacionDig #selectTrabajo").attr("disabled", true);
        $("#frmRegistrarAlmacenProductosFabricacionDig #selectManufacturaDig").attr("disabled", true);

        $.ajax({
            url: 'json/ajax_almacen/almacen.php',
            type: 'post',
            data: $datos + '&crud=createDig',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarAlmacenProductosFabricacionDig #spinnerButton").show();
                $("#frmRegistrarAlmacenProductosFabricacionDig #btnAlmacenProductFabricacion").attr("disabled", true);
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
                            self.tblListAlmacenProductosDigital.ajax.reload();
                            $("#frmRegistrarAlmacenProductosFabricacionDig")[0].reset();
                            $("#frmRegistrarAlmacenProductosFabricacionDig .select2modal").val('').trigger('change');
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
            error: function (e) {
                Swal.fire('Error!', e.responseText, 'error');
                $("#frmRegistrarAlmacenProductosFabricacionDig #btnAlmacenProductFabricacion").removeAttr("disabled");
                $("#frmRegistrarAlmacenProductosFabricacionDig #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarAlmacenProductosFabricacionDig #btnAlmacenProductFabricacion").removeAttr("disabled");
            $("#frmRegistrarAlmacenProductosFabricacionDig #spinnerButton").hide();
        });
    }

    onCreateAlmacenProductFabricacionConvencionalFormSubmit() {
        const self = this;
        $("#frmRegistrarAlmacenProductosFabricacionConv #selectTrabajo").attr("disabled", false);
        $("#frmRegistrarAlmacenProductosFabricacionConv #selectManufacturaConv").attr("disabled", false);
        const $datos = this.view.formRegistrarAlmacenProductosFabricacionConv.serialize();
        $("#frmRegistrarAlmacenProductosFabricacionConv #selectTrabajo").attr("disabled", true);
        $("#frmRegistrarAlmacenProductosFabricacionConv #selectManufacturaConv").attr("disabled", true);

        $.ajax({
            url: 'json/ajax_almacen/almacen.php',
            type: 'post',
            data: $datos + '&crud=createConv',
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarAlmacenProductosFabricacionConv #spinnerButton").show();
                $("#frmRegistrarAlmacenProductosFabricacionConv #btnAlmacenProductFabricacion").attr("disabled", true);
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
                            self.tblListAlmacenProductosConvencional.ajax.reload();
                            $("#frmRegistrarAlmacenProductosFabricacionConv")[0].reset();
                            $("#frmRegistrarAlmacenProductosFabricacionConv .select2modal").val('').trigger('change');
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
            error: function (e) {
                Swal.fire('Error!', e.responseText, 'error');
                $("#frmRegistrarAlmacenProductosFabricacionConv #btnAlmacenProductFabricacion").removeAttr("disabled");
                $("#frmRegistrarAlmacenProductosFabricacionConv #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarAlmacenProductosFabricacionConv #btnAlmacenProductFabricacion").removeAttr("disabled");
            $("#frmRegistrarAlmacenProductosFabricacionConv #spinnerButton").hide();
        });
    }

    listAlmacenProductFabricacionDigital() {
        const param = $('#frmRegistrarAlmacenProductosFabricacionDig #selectManufacturaDig').val();        

        this.tblListAlmacenProductosDigital = $('#tblListAlmacenProductosDigital').DataTable({
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
                url: "json/ajax_almacen/listarAlmacen.php",
                type: "POST",
                data: { tipo: param , listar: 'toProductDigital'},
                dataSrc: '',
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'codigo' },
                { 'data': 'product' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }

    listAlmacenProductFabricacionConvencional(){
        const param = $('#frmRegistrarAlmacenProductosFabricacionConv #selectManufacturaConv').val();        

        this.tblListAlmacenProductosConvencional = $('#tblListAlmacenProductosConvencional').DataTable({
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
                url: "json/ajax_almacen/listarAlmacen.php",
                type: "POST",
                data: { tipo: param , listar: 'toProductConvencional'},
                dataSrc: '',
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'codigo' },
                { 'data': 'product' },
                { 'data': 'enabled' },
                { 'data': 'acciones' },
            ]
        });
    }

    eliminarAlmacenProducto(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Se eliminará del almacén el producto seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_almacen/almacen.php",
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
                                    'Anulado!',
                                    'El producto en el almacén a sido "Eliminado"',
                                    'success'
                                );
                                self.tblListAlmacenProductosFabricacion.ajax.reload();
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

    reingresarAlmacenProducto(param) {
        const self = this;
        Swal.fire({
            title: 'Estas seguro en reintegrar?',
            text: "Se reintegrará el producto del almacén selecciondo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_almacen/almacen.php",
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
                                    'El producto en el almacén paso a activo',
                                    'success'
                                );
                                self.tblListAlmacenProductosFabricacion.ajax.reload();
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
}