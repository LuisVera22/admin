class AlmacenstockController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.eliminarAlmacenStock = this.eliminarAlmacenStock.bind(this);
        window.reingresarAlmacenStock = this.reingresarAlmacenStock.bind(this);

    }

    listAlmacen() {
        const selectStock = $('#selectManufacturaStock').val();

        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));
        
        let dataSend = {};
        let hideAddressColumn = false;

        if (localPrincipal === null) {
            dataSend = { manufactura: selectStock, sede: 0, listar: 'toProductStockStorehouse' };
        } else {
            dataSend = { manufactura: selectStock, sede: localPrincipal.idstore, listar: 'toProductStockStorehouse' };
            hideAddressColumn = true;
        }

        this.tblListAlmacenStock = $('#tblListAlmacenStock').DataTable({
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
                data: dataSend,
                dataSrc: '',
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                {
                    targets: 3, // Índice de la columna 'store.address'
                    visible: !hideAddressColumn // Establece la visibilidad
                }
            ],
            columns: [
                { 'data': 'storehouse.codigo' },
                { 'data': 'storehouse.product' },
                { 'data': 'quantity' },
                { 'data': 'store.address' },
                { 'data': 'almacen' },
                { 'data': 'storehouse.enabled' },
                { 'data': 'acciones' },
            ]
        });
    }

    exportarExcel() {
        $('#btn_Items').on('click', function () {
            const selectManufacatura = $('#frmRegistrarAlmacenStock #selectManufactura').val();
            $.ajax({
                url: 'json/ajax_almacen/almacenExportar.php',
                method: 'POST',
                data: { crud: 'exportStock', manufactura: selectManufacatura },
                xhrFields: {
                    responseType: 'blob' // Importante para manejar el archivo binario
                },
                success: function (response) {
                    // Crear un enlace temporal para descargar el archivo
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'Productos_Almacenar_Cantidad.xlsx'; // Nombre del archivo para descargar
                    link.click();
                },
                error: function (e) {
                    console.log("error " + e.responseText);
                }
            });
        });
    }

    onChargeAlmacenCantidad() {
        const self = this;
        const local = JSON.parse(localStorage.getItem('empleado'));
        const selectManufacatura = $('#frmRegistrarAlmacenStock #selectManufacturaStock').val();

        if (local === null) {
            Swal.fire('Operación Detenida!', 'No se detecto la sede del usuario', 'warning');
        } else {
            if ($('#archivoExcel').get(0).files.length === 0) {
                toastr.warning('Debe seleccionar un archivo Excel');
            } else {
                const $extencionpermitida = ['.xls', '.xlsx'];
                const $input_file = $('#archivoExcel');
                const exp_reg = new RegExp("([a-zA-Z0-9()\s_\\-.\:])+(" + $extencionpermitida.join('|') + ")$");

                if (!exp_reg.test($input_file.val().toLowerCase())) {
                    toastr.warning('El archivo debe ser un formato Excel');
                    return false;
                }

                const $datos = new FormData($(frmRegistrarAlmacenStock)[0]);
                $datos.append('store', local.idstore);
                $datos.append('manufactura', selectManufacatura);
                $datos.append('crud', 'chargeStock');

                $.ajax({
                    url: 'json/ajax_almacen/almacenCargarExcel.php',
                    type: 'POST',
                    data: $datos,
                    cache: false,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (e) {
                        if (e.responseJson == 'cargado') {
                            swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Se cargaron un total de ' + e.totalData + ' datos para la cantidad de almacén',
                                showConfirmButton: false,
                                //timer: 5000
                            });

                            self.tblListAlmacenStock.ajax.reload();

                        } else if (e.responseJson == 'errorCarga') {
                            if (e.detalleErrores[0].tipo == 'validacion') {
                                Swal.fire('Incorrecto!', e.detalleErrores[0].errores[0] + 'la fila ' + e.detalleErrores[0].fila + ' es incorrecta', 'warning');
                            } else if (e.detalleErrores[0].tipo == 'creacion') {
                                Swal.fire('Error!', e.detalleErrores[0].errores[0], 'error');
                            } else if (e.detalleErrores[0].tipo == 'conexion') {
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
                            } else if (e.detalleErrores[0].tipo == 'mantenimiento') {
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
                            }
                        } else if (e.responseJson == 'errorArchivo') {
                            swal.fire('ERROR!!!', 'Ocurrio un error al cargar el archivo excel', 'error');
                        }
                    },
                    error: function (e) {
                        Swal.fire('Error!', e.responseText, 'error');
                        $('#loading').hide();
                    }
                }).done(function () {
                    $('#loading').hide();
                });

            }
        }
    }

    eliminarAlmacenStock(param) {
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
                        Swal.fire('Error!', 'Error en la solicituda AJAX', 'error');
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
                                    'La clase seleccionada paso a inactiva',
                                    'success'
                                );
                                self.tblListAlmacenStock.ajax.reload();
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

    reingresarAlmacenStock(param) {
        const self = this;
        Swal.fire({
            title: 'Estas seguro en reintegrar?',
            text: "Se reintegrará el producto del almacén seleccionado",
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
                                self.tblListAlmacenStock.ajax.reload();
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