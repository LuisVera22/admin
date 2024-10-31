class CotizacionController {
    constructor(model, view) {
        this.model = model;
        this.view = view;
        this.tblListOrdenTrabajo = null;

        window.eliminarCotizacion = this.eliminarCotizacion.bind(this);
        window.reingresarCotizacion = this.reingresarCotizacion.bind(this);
        window.actualizarCotizacion = this.actualizarCotizacion.bind(this);
        //this.listCotizaciones();
    }

    bloqueCampos() {
        const vendor = JSON.parse(localStorage.getItem('empleado'));
        if (vendor) {
            $('#frmFilterOrdenes #filtro_sede').attr('hidden', true);
        }
    }

    listCotizaciones() {
        // Desactiva stateSave antes de destruir la tabla
        $('#tblListOrdenTrabajo').DataTable().state.clear();
        // Destruye la tabla
        $('#tblListOrdenTrabajo').DataTable().destroy();

        const store = JSON.parse(localStorage.getItem('empleado'));
        let tienda = store ? store.idstore : 0;

        const self = this;
        function listarOrdenes() {
            //var table = this.tblListOrdenTrabajo;

            self.tblListOrdenTrabajo = $('#tblListOrdenTrabajo').DataTable({
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
                    url: "json/ajax_cotizacion/listarCotizacion.php",
                    type: 'post',
                    data: { local: tienda },
                    dataSrc: ''
                },
                responsive: true,
                columnDefs: [
                    { width: '10px', targets: 0 },
                    { width: '10px', targets: 1 },
                    { width: '10px', targets: 2 },
                    { width: '50px', targets: 3 },
                    { responsivePriority: 1, targets: 0 }, // Primera columna con mayor prioridad (nunca se oculta)
                    { responsivePriority: 2, targets: 3 }, // Primera columna con mayor prioridad (nunca se oculta)
                    { responsivePriority: 3, targets: 4 }, // Columna 'enabled' (nunca se oculta)
                    { responsivePriority: 4, targets: 9 } // Primera columna con mayor prioridad (nunca se oculta)                    
                ],
                columns: [
                    { 'data': 'checkbox' },
                    { 'data': 'ticket' },
                    { 'data': 'date_issue' },
                    {
                        'data': 'codigo',
                        'className': 'dt-center'
                    },
                    {
                        'data': 'client', 'render': function (data, type, row) {
                            if (data.length > 30) {
                                return data.substr(0, 30) + '...'; // Trunca el texto a 20 caracteres
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        'data': 'descripciontotal',
                        'render': function (data, type, row) {
                            if (data.length > 70) {
                                return data.substr(0, 70) + '...'; // Trunca el texto a 20 caracteres
                            } else {
                                return data;
                            }
                        }
                    },
                    { 'data': 'vendedor' },
                    { 'data': 'mensajero' },
                    { 'data': 'sede' },
                    { 'data': 'enabled' },
                    { 'data': 'status_mialmacen' },
                    { 'data': 'status_rbcalmacen' },
                    { 'data': 'acciones' }
                ],
                createdRow: function (row, data, dataIndex) {
                    // Agregar el forma_pago como un atributo de datos en la fila
                    $(row).attr('data-forma_pago', data.forma_pago);
                },
                order: []
            });

            $('#frmFilterOrdenes #filterCliente').change(function () {
                self.tblListOrdenTrabajo.column($(this).data('index')).search(this.value).draw();
            });
            $('#frmFilterOrdenes #filtroOrden').keyup(function () {
                self.tblListOrdenTrabajo.column($(this).data('index')).search(this.value).draw();
            });
            $('#frmFilterOrdenes #filterMensajero').change(function () {
                self.tblListOrdenTrabajo.column($(this).data('index')).search(this.value).draw();
            });
            $('#frmFilterOrdenes #filterVendedor').change(function () {
                self.tblListOrdenTrabajo.column($(this).data('index')).search(this.value).draw();
            });
            $('#frmFilterOrdenes #filterSede').change(function () {
                self.tblListOrdenTrabajo.column($(this).data('index')).search(this.value).draw();
            });

        }
        listarOrdenes();
        $('#btn_search').on('click', function (e) {
            e.preventDefault();
            let $desde = $('#textInicio').val();
            let $hasta = $('#textFin').val();

            const store = JSON.parse(localStorage.getItem('empleado'));
            let tienda = store ? store.idstore : 0;


            if ($desde == '' && $hasta == '') {
                $('#aviso_fecha').attr("hidden", false);
            } else {
                let $newhasta = ''
                if ($hasta == '') {
                    $newhasta;
                } else {
                    $newhasta = $('#textFin').val();
                }
                $('#aviso_fecha').attr("hidden", true);

                self.tblListOrdenTrabajo.clear().destroy();

                self.tblListOrdenTrabajo = $('#tblListOrdenTrabajo').DataTable({
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
                        url: "json/ajax_cotizacion/listarCotizacion.php",
                        type: "POST",
                        data: { crud: "listFecha", desde: $desde, hasta: $newhasta, local: tienda },
                        dataSrc: ''
                    },
                    responsive: true,
                    columnDefs: [
                        { width: '10px', targets: 0 },
                        { width: '10px', targets: 1 },
                        { width: '10px', targets: 2 },
                        { width: '50px', targets: 3 },
                        { responsivePriority: 1, targets: 0 }, // Primera columna con mayor prioridad (nunca se oculta)
                        { responsivePriority: 2, targets: 3 }, // Primera columna con mayor prioridad (nunca se oculta)
                        { responsivePriority: 3, targets: 4 }, // Columna 'enabled' (nunca se oculta)
                        { responsivePriority: 4, targets: 9 } // Primera columna con mayor prioridad (nunca se oculta)                        
                    ],
                    columns: [
                        { 'data': 'checkbox' },
                        { 'data': 'ticket' },
                        { 'data': 'date_issue' },
                        {
                            'data': 'codigo',
                            'className': 'dt-center'
                        },
                        {
                            'data': 'client', 'render': function (data, type, row) {
                                if (data.length > 30) {
                                    return data.substr(0, 30) + '...'; // Trunca el texto a 20 caracteres
                                } else {
                                    return data;
                                }
                            }
                        },
                        {
                            'data': 'descripciontotal',
                            'render': function (data, type, row) {
                                if (data.length > 70) {
                                    return data.substr(0, 70) + '...'; // Trunca el texto a 20 caracteres
                                } else {
                                    return data;
                                }
                            }
                        },
                        { 'data': 'vendedor' },
                        { 'data': 'mensajero' },
                        { 'data': 'sede' },
                        { 'data': 'enabled' },                        
                        { 'data': 'status_mialmacen' },
                        { 'data': 'status_rbcalmacen' },
                        { 'data': 'acciones' },
                    ],
                    order: []
                });
            }
        });

        self.tblListOrdenTrabajo.on('click', 'tbody tr', function (e) {
            // Verificar si el clic se realizó en un botón dentro de la columna "Acciones"
            if ($(e.originalEvent.target).closest('button').length > 0) {
                return;
            }

            // Obtener la fila de DataTable
            var row = self.tblListOrdenTrabajo.row(this);
            // Obtener el checkbox de la fila
            if (row && row.node()) {
                var checkbox = row.node().getElementsByTagName('input')[0];
                // Verificar si el checkbox está deshabilitado
                if (checkbox.disabled) {
                    return; // Si está deshabilitado, salir sin hacer nada
                }
                // Alternar el estado del checkbox
                checkbox.checked = !checkbox.checked;
            }

        });

        $('#btn_eraser').on('click', function () {
            rangeFecha();
            self.tblListOrdenTrabajo.clear().destroy();
            listarOrdenes();
        });


    }
    eliminarCotizacion(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en eliminar?',
            text: "Se inactivará el orden de trabajo seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_cotizacion/cotizacion.php",
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
                                    'La Orden de Trabajo paso a Inactivo',
                                    'success'
                                );
                                self.tblListOrdenTrabajo.ajax.reload(null, false);
                            }
                        } else {
                            if (e.message == "Error al eliminar.") {
                                Swal.fire(
                                    'Error!',
                                    'No se pudo procesar la eliminación del dato.',
                                    'error'
                                );
                            } else if (e.errors[0] == "No se pudo conectar a la base de datos") {
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
    reingresarCotizacion(param) {
        const self = this;
        Swal.fire({
            title: 'Estás seguro en reintegrar?',
            text: "Se reintegrará la Orden de Trabajo seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reintegrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "json/ajax_cotizacion/cotizacion.php",
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
                                    'La Orden de Trabajo paso a Activo',
                                    'success'
                                );
                                self.tblListOrdenTrabajo.ajax.reload(null, false);
                            }
                        } else {
                            if (e.message == "Error al eliminar.") {
                                Swal.fire(
                                    'Error!',
                                    'No se pudo procesar la eliminación del dato.',
                                    'error'
                                );
                            } else if (e.errors[0] == "No se pudo conectar a la base de datos") {
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
    actualizarCotizacion(param) {
        $('#frmEnviarMotivo').submit(function (e) {
            e.preventDefault();

            let $datos = $(this).serialize();

            $datos += "&param=" + encodeURIComponent(param);
            $datos += "&crud=reason";

            $.ajax({
                url: "json/ajax_cotizacion/cotizacion.php",
                type: "post",
                data: $datos,
                dataType: 'json',
                beforeSend: function () {
                    $("#frmEnviarMotivo #spinnerButton").show();
                    $("#frmEnviarMotivo #btnMotivo").attr("disabled", true);
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
                                setTimeout(function () {
                                    sessionStorage.setItem(`datos`, param);
                                    $("#frmEnviarMotivo #btnMotivo").removeAttr("disabled");
                                    $("#frmEnviarMotivo #spinnerButton").hide();
                                    window.location = 'actualizar-orden-trabajo';
                                }, 2000);
                            }
                        } else {
                            if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                Swal.fire({
                                    title: 'No se pudo conectar a la base de datos' + ' <i class="far fa-tired"></i>',
                                    text: "Haga click en 'Aceptar' para salir del sistema",
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
                                    text: "Haga click en 'Aceptar' para salir del sistema",
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
                    $("#frmEnviarMotivo #btnMotivo").removeAttr("disabled");
                    $("#frmEnviarMotivo #spinnerButton").hide();
                }
            }).done(function () {
                toastr.info("Motivo ha sido enviado, procediendo a cambiar de vista...");
            });
        });

    }
    convertirFactura() {
        const self = this;
        $('#btn_venta_electronica').on('click', function () {
            let arr_id = $(':checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            let clients = [];
            let codigosConCredito = [];
            let tieneCredito = false;
            let tieneContado = false;

            self.tblListOrdenTrabajo.rows().every(function (rowIdx, tableLoop, rowLoop) {
                let data = this.data();
                let checkboxHtml = data.checkbox; // HTML del checkbox
                let checkboxValue = $(checkboxHtml).find('input').val();

                if (arr_id.includes(checkboxValue)) {
                    clients.push(data.client);
                    // Verificar la forma de pago
                    if (data.forma_pago === 'CRÉDITO') {
                        codigosConCredito.push(data.codigo);
                        tieneCredito = true;
                    } else if (data.forma_pago === 'CONTADO') {
                        tieneContado = true;
                    }
                }
            });

            console.log(codigosConCredito);

            let uniqueClients = [...new Set(clients)];

            if (arr_id.length === 0) {
                Swal.fire('¡Alerta!', 'Se debe seleccionar al menos una <strong>Orden de Trabajo</strong> para poder realizar la boleta electrónica', 'warning');
                sessionStorage.removeItem(`faturarIdOrdenes`);
            } else {
                $.ajax({
                    url: 'json/ajax_cotizacion/cotizacion.php',
                    type: 'post',
                    data: { arrays_id: arr_id, crud: 'getFacturados' },
                    dataType: 'json',
                    beforeSend: function () {
                        $('#loading').show();
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
                                let valores_facturados = [];
                                if (e.facturados.length > 0) {
                                    e.facturados.forEach(element => {
                                        valores_facturados.push(element.codigo);
                                    });
                                    Swal.fire('¡Alerta!', 'El Código <strong>' + valores_facturados + '</strong> de la Orden de Trabajo ya está(n) facturada(s).', 'warning');
                                } else {
                                    if (tieneCredito && tieneContado) {
                                        let codigosString = codigosConCredito.join(', ');
                                        Swal.fire('¡Alerta!', 'No se puede agrupar órdenes con formas de pago mixtas de Contado y Crédito. Las órdenes con "Crédito" son: <strong>' + codigosString + '</strong>.', 'warning');
                                    } else if (codigosConCredito.length > 1) {
                                        Swal.fire('¡Alerta!', 'Las órdenes con forma de pago "Crédito" no se pueden agrupar.', 'warning');
                                    } else if (uniqueClients.length > 1) {
                                        Swal.fire('¡Alerta!', 'Se ha detectado que se desea facturar con <strong>' + uniqueClients.length + '</strong> Clientes diferentes: <strong>' + uniqueClients + '</strong>, ¿está seguro que desea facturar? se recomienda consultar con la supervisor(a).', 'warning');
                                    } else {
                                        Swal.fire('¡Éxito!', 'Todos los datos son válidos y se puede proceder con la facturación.', 'success');
                                        sessionStorage.setItem('faturarIdOrdenes', arr_id);
                                        window.location = 'facturar-orden';
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
                        $('#loading').hide();
                    }
                }).done(function () {
                    $('#loading').hide();
                });
            }
        });

    }
    enviarMialmacen() {
        $('#btn_enviar_almacen').click(function () {
            var arr_id = $(':checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            console.log(arr_id);

            if (arr_id.length == 0) {
                swal.fire('ORDENES NO SELECCIONADAS', 'Se debe almenos seleccionar una <strong>ORDEN DE TRABAJO</strong> para poder enviar al <strong>ALMACÉN</strong>.', 'warning');
            } else {
                Swal.fire({
                    title: 'ENVIAR A ALMACÉN',
                    text: "Seguro de enviar la(s) orden(es) de trabajo seleccionado(s) al almacén?, clic en 'Si' para continuar.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {


                    } else {
                        alertify.error('Canceló la operación');
                    }
                });
            }

        });
    }
    enviarRbcalmacen() {
        $('#btn_enviar_rbc').click(function () {
            var arr_id = $(':checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            console.log(arr_id);
            if (arr_id.length == 0) {
                swal.fire('ORDENES NO SELECCIONADAS', 'Se debe almenos seleccionar una <strong>ORDEN DE TRABAJO</strong> para poder enviar a <strong>LIMA RBC</strong>.', 'warning');
            } else {
                Swal.fire({
                    title: 'ENVIAR A LIMA RBC',
                    text: "Está seguro en enviar la(s) orden(es) de trabajo seleccionado(s) al Lima RBC?, clic en 'Si' para continuar.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const dataSend = arr_id.map(function (id) {
                            return {
                                ordenesTrabajo: id
                            }
                        });

                        $.ajax({
                            url: "json/ajax_despachoalmacen/despachoalmacen.php",
                            type: "post",
                            data: { batchData: dataSend, crud: "sendAlmacenRbc" },
                            dataType: 'json',
                            beforeSend: function () {
                                $("#btn_enviar_rbc #spinnerButton").show();
                                $("#btn_enviar_rbc #fa_icon").hide();
                                $("#btn_enviar_rbc").attr("disabled", true);
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
                                            swal.fire('ORDENES ENVIADAS A Lima RBC', 'Las ordenes seleccionadas fueron enviadas a Lima RBC.', 'success');
                                        }else{
                                            swal.fire('YA HABIAN SIDO ENVIADAS, SE DETUBVO LA OPERACIÓN', e.message, 'warning');
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
                                        }
                                    }
                                }
                            },
                            error: function (error) {
                                Swal.fire('Error!', error.responseText, 'error');
                                $("#btn_enviar_rbc #spinnerButton").hide();
                                $("#btn_enviar_rbc #fa_icon").show();
                                $("#btn_enviar_rbc").removeAttr("disabled");
                            }
                        }).done(function () {
                            $("#btn_enviar_rbc #spinnerButton").hide();
                            $("#btn_enviar_rbc #fa_icon").show();
                            $("#btn_enviar_rbc").removeAttr("disabled");
                        });
                    } else {
                        alertify.error('Canceló la operación');
                    }
                });
            }
        });
    }
}