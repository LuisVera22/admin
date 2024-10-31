class OrdentrabajoUdtController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        //window.mostrandodataCliente = this.mostrandodataCliente.bind(this);
    }
    bloqueCampos() {
        const vendor = JSON.parse(localStorage.getItem('empleado'));
        if (vendor) {
            $('#encabezado_actaulizar_orden #selectRecepcionado').attr('disabled', true);
            $('#encabezado_actaulizar_orden #selectSede').attr('disabled', true);
        }
    }
    obtenerValoresParaActualizar() {

        let $param = sessionStorage.getItem(`datos`);
        const pageInstanceId = sessionStorage.getItem('pageInstanceId');
        const self = this;

        if ($param && !pageInstanceId) {

            $.ajax({
                url: "json/ajax_cotizacion/cotizacion.php",
                type: "post",
                data: { param: $param, crud: "getQuotation" },
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

                        $('#textCliente').val(e.client);
                        $('#selectTipoDocumento').val(e.idtype_document).trigger('change');
                        $('#textNDocumento').val(e.number_document);
                        $('#textDireccion').val(e.address_client);
                        $('#textDireccion').val(e.address_client);
                        $('#selectTipoManufactura').val(e.idtype_manufacturing).trigger('change');
                        $('#textTiempoEntrega').val(e.delivery_time);
                        $('#selectMensajero').val(e.idcourier).trigger('change');
                        $('#selectRecepcionado').val(e.idvendor).trigger('change');
                        $('#selectSede').val(e.idstore).trigger('change');
                        $('#selectFormaPago').val(e.forma_pago);
                        if (e.forma_pago === "CRÉDITO") {
                            $('.cuadro_credito').show();
                        }

                        let fechaEmision = cambiarFormatoFecha(e.date_issue);
                        $('#textEmision').val(fechaEmision);
                        $('.input-group.date.textEmision').datepicker({
                            format: "dd/mm/yyyy",
                            autoclose: true,
                            todayHighlight: true,
                            'language': 'es'
                        }).datepicker('setDate', fechaEmision);


                        $('#textObservacion').val(e.notes);

                        let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];
                        let itemsLaboratorio = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`)) || [];
                        let itemsCuotas = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`)) || [];

                        e.quotationdetail.forEach((itemDetail) => {
                            let commonId = Math.random().toString(36).substring(2, 9);
                            let valorCommonId = itemDetail.laboratory!==null ? commonId : null;
                            items.push(
                                {
                                    idDetail: itemDetail.id,
                                    idproduct: itemDetail.idproduct,
                                    quantity: itemDetail.quantity,
                                    unidadmedida: itemDetail.unidadmedida,
                                    description: itemDetail.description,
                                    detail_manufacturing: itemDetail.detail_manufacturing,
                                    price: itemDetail.price,
                                    discount: itemDetail.discount,
                                    pricesinigv: itemDetail.pricesinigv,
                                    subtotal: itemDetail.subtotal,
                                    igv: itemDetail.igv,
                                    total: itemDetail.total,
                                    commonId: valorCommonId
                                }
                            );
                            if (itemDetail.laboratory != null) {
                                itemsLaboratorio.push(
                                    {
                                        commonId: commonId,
                                        esfod: itemDetail.laboratory.esfod,
                                        cilod: itemDetail.laboratory.cylod,
                                        ejeod: itemDetail.laboratory.ejeod,
                                        addod: itemDetail.laboratory.addod,
                                        prismaod: itemDetail.laboratory.prismaod,
                                        altod: itemDetail.laboratory.altod,
                                        dipod: itemDetail.laboratory.dipod,
                                        diametrood: itemDetail.laboratory.diametrood,
                                        esfoi: itemDetail.laboratory.esfoi,
                                        ciloi: itemDetail.laboratory.cyloi,
                                        ejeoi: itemDetail.laboratory.ejeoi,
                                        addoi: itemDetail.laboratory.addoi,
                                        prismaoi: itemDetail.laboratory.prismaoi,
                                        altoi: itemDetail.laboratory.altoi,
                                        dipoi: itemDetail.laboratory.dipoi,
                                        diametrooi: itemDetail.laboratory.diametrooi,
                                        v: itemDetail.laboratory.v,
                                        h: itemDetail.laboratory.h,
                                        d: itemDetail.laboratory.d,
                                        pte: itemDetail.laboratory.pte,
                                        alt: itemDetail.laboratory.alt,
                                        dip: itemDetail.laboratory.dip,
                                        inicialespacientes: itemDetail.laboratory.inicialespacientes,
                                        diametro: itemDetail.laboratory.diametro,
                                        corredor: itemDetail.laboratory.corredor,
                                        reduccion: itemDetail.laboratory.reduccion,
                                        idDetail: itemDetail.laboratory.idquotationdetail
                                    }
                                );
                            }
                        });

                        // Guardar los datos en localStorage
                        sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
                        sessionStorage.setItem(`selectedUdtLaboratory`, JSON.stringify(itemsLaboratorio));

                        self.updateSecondTable();

                        if (e.quotationcuotas.length > 0) {
                            //let existingCuotaIds = itemsCuotas.map(item => item.fecha);
                            e.quotationcuotas.forEach((itemCuota) => {
                                //if (!existingCuotaIds.includes(itemCuota.fecha)) {
                                itemsCuotas.push(
                                    {
                                        idCuotas: itemCuota.id,
                                        monto: itemCuota.monto,
                                        fecha: itemCuota.fecha,
                                    }
                                );
                                // }
                            });
                            // Guardar datos de cuotas en localStorage
                            sessionStorage.setItem(`selectedUdtCuotas`, JSON.stringify(itemsCuotas));
                            self.updateSecondTableCuotas();
                        }
                        sessionStorage.setItem('pageInstanceId', 'true');
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
        } else if ($param && pageInstanceId) {
            sessionStorage.removeItem(`selectedUdtItems`);
            sessionStorage.removeItem(`selectedUdtLaboratory`);
            sessionStorage.removeItem(`selectedUdtCuotas`);
            sessionStorage.removeItem('pageInstanceId');
            sessionStorage.removeItem('datos');
            window.location = 'ordenes-trabajo';
        }
    }
    mostrandodataCliente() {
        let param; // Declara param fuera de la función anónima
        $('#selectCliente').change(function () {
            param = $('#selectCliente').val();
            $.ajax({
                url: "json/ajax_cliente/cliente.php",
                type: "post",
                data: { param: param, crud: "changeClient" },
                dataType: 'json',
                error: function (error) {
                    Swal.fire('Error!', error.responseText, 'error');
                }
            }).done(function (e) {
                if (e.responseJson == "no server") {
                    Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                } else if (e.responseJson == "vacio") {
                    $("#selectTipoDocumento").val(null).trigger('change');
                    $("#textNDocumento").val(null);
                    $("#textCliente").val(null);
                    $("#textDireccionFiscal").val(null);
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
                        $("#selectTipoDocumento").val(e.typedocumentId).trigger('change');
                        $("#textNDocumento").val(e.number_document);
                        if (e.names == "" && e.lastnames == "" || e.names == null && e.lastnames == null) {
                            $("#textCliente").val(e.bussinesnames);
                        } else if (e.bussinesnames == "" || e.bussinesnames == null) {
                            $("#textCliente").val(e.lastnames + ", " + e.names);
                        } else if (e.bussinesnames == "" || e.bussinesnames == null || e.names == "" && e.lastnames == "" || e.names == null && e.lastnames == null) {
                            $("#textCliente").val(e.tradename);
                        }
                        $("#textDireccionFiscal").val(e.address_fiscal);
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
        })
    }
    mostrandoCuotas() {
        let param;
        const self = this;
        $('.cuadro_credito').hide();
        $('#selectFormaPago').change(function () {
            param = $('#selectFormaPago').val();
            if (param === "CRÉDITO") {
                $('.cuadro_credito').show();
            } else {
                $('.cuadro_credito').hide();
                self.updateSecondTableCuotas();
            }
        })
    }
    mostrandoManufacturacion() {
        let param;
        $('#agregando_item').click(function () {
            param = $('#encabezado_actaulizar_orden #selectTipoManufactura').val();
            if (param === "") {
                Swal.fire('', 'Favor de elegir el <strong>tipo de manufacturación</strong> para poder agregar los Items.', 'warning');
            } else {
                $('#agregarItem').modal('show');

                const selectedOption = $('#encabezado_actaulizar_orden #selectTipoManufactura').find('option:selected');
                const abreviatura = selectedOption.data('abrev');

                if (abreviatura === 'STCK') {
                    $('#textPrecio').attr('disabled', false);
                    $('#mostrar_parametros').attr('hidden', true);
                } else {
                    $('#textPrecio').attr('disabled', true);
                    $('#mostrar_parametros').attr('hidden', false);
                }

                $.ajax({
                    url: 'json/ajax_producto/producto.php',
                    type: 'post',
                    data: { crud: 'getProductoxManufactura', tipo: param },
                    dataType: 'json'
                }).done(function (e) {
                    if (e.length == 0) {
                        html = `<option value="">[-seleccione producto-]</option>`;
                    } else {
                        html = `<option value="">[-seleccione producto-]</option>`;
                        for (let i = 0; i < e.length; i++) {
                            html += `<option value="${e[i].id}" data-price="${e[i].price}" data-description="${e[i].description}">${e[i].description}</option>`;
                        }
                    }

                    $('#frmRegistrarItems #selectProductoItem').html(html);
                });
            }
        });
    }
    seleccionarProducto(){
        // Evento change para llenar los campos de descripción y precio
        $('#frmRegistrarItems #selectProductoItem').change(function () {

            const selectedOption = $(this).find('option:selected');
            const description = selectedOption.data('description');
            const price = selectedOption.data('price');

            $('#frmRegistrarItems  #textDetalleProducto').val(description); // Cambia el ID por el correspondiente
            $('#frmRegistrarItems  #textPrecio').val(price); // Cambia el ID por el correspondiente
        });

        $('#frmEditarItems #selectProductoItem').change(function () {

            const selectedOption = $(this).find('option:selected');
            const description = selectedOption.data('description');
            const price = selectedOption.data('price');

            $('#frmEditarItems #textDetalleProducto').val(description); // Cambia el ID por el correspondiente
            $('#frmEditarItems #textPrecio').val(price); // Cambia el ID por el correspondiente
        });
    }
    mostrandoAlturas() {
        $('#CheckAlturas').click(function () {
            if (this.checked) {
                $('#alt_show').hide();
                $('#alt_doble').removeClass('d-none');
                $('#textAlt').val('');
            } else {
                $('#alt_show').show();
                $('#alt_doble').addClass('d-none');
                $('#textAltOd,#textAltOi').val('');
            }
        });

        $('#frmEditarItems #CheckAlturas').click(function () {
            if (this.checked) {
                $('#frmEditarItems #alt_show').hide();
                $('#frmEditarItems #alt_doble').removeClass('d-none');
                $('#frmEditarItems #textAlt').val('');
            } else {
                $('#frmEditarItems #alt_show').show();
                $('#frmEditarItems #alt_doble').addClass('d-none');
                $('#frmEditarItems #textAltOd,#frmEditarItems #textAltOi').val('');
            }
        });
    }
    mostrandoDips() {
        $('#CheckDips').click(function () {
            if (this.checked) {
                $('#show_dip').hide();
                $('#dual_dip').removeClass('d-none');
                $('#textDnp_Dip').val('');
            } else {
                $('#show_dip').show();
                $('#dual_dip').addClass('d-none');
                $('#textDnp_Dip_Od,#textDnp_Dip_Oi').val('');
            }
        });

        $('#frmEditarItems #CheckDips').click(function () {
            if (this.checked) {
                $('#frmEditarItems #show_dip').hide();
                $('#frmEditarItems #dual_dip').removeClass('d-none');
                $('#frmEditarItems #textDnp_Dip').val('');
            } else {
                $('#frmEditarItems #show_dip').show();
                $('#frmEditarItems #dual_dip').addClass('d-none');
                $('#frmEditarItems #textDnp_Dip_Od,#frmEditarItems #textDnp_Dip_Oi').val('');
            }
        });
    }
    mostrandoDiametros() {
        $('#CheckDiametro').click(function () {
            if (this.checked) {
                $('#show_diametro').hide();
                $('#diametro_dual').removeClass('d-none');
                $('#textDiametro').val('');
            } else {
                $('#show_diametro').show();
                $('#diametro_dual').addClass('d-none');
                $('#textDiametroOd,#textDiametroOi').val('');
            }
        });

        $('#frmEditarItems #CheckDiametro').click(function () {
            if (this.checked) {
                $('#frmEditarItems #show_diametro').hide();
                $('#frmEditarItems #diametro_dual').removeClass('d-none');
                $('#frmEditarItems #textDiametro').val('');
            } else {
                $('#frmEditarItems #show_diametro').show();
                $('#frmEditarItems #diametro_dual').addClass('d-none');
                $('#frmEditarItems #textDiametroOd,#frmEditarItems #textDiametroOi').val('');
            }
        });
    }
    calcularSaldo() {
        $('#adelanto').change(function () {
            let adelanto = parseFloat($(this).val());
            let total = parseFloat($('#total').val());
            let saldo = total - adelanto;

            if (adelanto === 0 || adelanto === 0.0) {
                $('#saldo').val("0");
            } else if (adelanto < total) {
                $('#saldo').val(saldo.toFixed(2));
            } else if (adelanto > total) {
                toastr.warning('El adelanto no puede ser mayor que el total. <i class="far fa-grimace"></i>');
                $('#adelanto').val(0.0);
                $('#saldo').val(0.0);
            }
        });
    }
    tablaServicios() {
        const self = this;

        this.tblListServicioStore = $('#tblListServicioStore').DataTable({
            ordering: false,
            info: false,
            lengthMenu: [20],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                paginate: {
                    previous: '<',
                    next: '>'
                }
            },
            ajax: {
                url: "json/ajax_producto/listarProducto.php",
                type: "POST",
                data: { listar: "toServiceItem", product: "services" },
                dataSrc: '',
            },
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                { 'data': 'description' },
                { 'data': 'price' },
            ],
            createdRow: function (row, data, dataIndex) {
                // Agregar el id como un atributo de datos en la fila
                $(row).attr('data-id', data.id);
            }
        });

        // Almacenar el contexto de la tabla
        const table = this.tblListServicioStore;

        table.on('click', 'tbody tr', function () {
            let data = table.row(this).data();
            let id = $(this).attr('data-id'); // Obtener el id desde el atributo de la fila
            data.id = id; // Agregar el id al objeto data
            addToLocalStorage(data);
            self.updateSecondTable();
        });

        function addToLocalStorage(data) {
            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];

            // Verificar si la descripción ya existe en los elementos del localStorage
            let existeDescripcion = items.some(item => item.description === data.description);

            let sinigv = parseFloat((data.price / 118) * 100).toFixed(2);
            let subtotal = parseFloat((data.price / 118) * 100).toFixed(2);
            let igvPrecio = parseFloat((data.price / 118) * 18).toFixed(2);

            if (!existeDescripcion) {
                items.push(
                    {
                        idDetail: null,
                        idproduct: data.id,
                        quantity: 1,
                        unidadmedida: 'UNI',
                        description: data.description,
                        detail_manufacturing: data.description,
                        price: Number(data.price),
                        discount: 0,
                        pricesinigv: Number(sinigv),
                        subtotal: Number(subtotal),
                        igv: Number(igvPrecio),
                        total: Number(data.price),
                        commonId: null
                    }
                );

                sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
                toastr.success('El servicio ha sido agregado a la tabla. <i class="far fa-smile-wink"></i>');
            } else {
                toastr.warning('El servicio ya fue agregado a la tabla. <i class="far fa-grimace"></i>');
            }

        }

        // Actualizar los datos en localStorage y la tabla al cambiar los valores de los inputs
        $(document).on('change', '.cantidad, .precio, .descuento', function () {
            // Encuentra la fila (tr) más cercana que contiene el input que disparó el evento
            let row = $(this).closest('tr');
            // Obtiene el índice de la fila
            let index = row.data('index');
            // Recupera los items del localStorage
            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`));

            // Obtiene los nuevos valores de los inputs
            let cantidad = parseFloat(row.find('.cantidad').val()) || 0.0;
            let precio = parseFloat(row.find('.precio').val()) || 0.0;
            let descuento = parseFloat(row.find('.descuento').val()) || 0.0;

            let precioDescuento = precio - descuento;
            let presiosinigv = (precioDescuento / 118) * 100;
            let totalCalculado = cantidad * precioDescuento;

            let subtotal = (totalCalculado / 118) * 100;
            let igvPrecio = (totalCalculado / 118) * 18;


            // Actualiza los valores en el array de items
            items[index].quantity = Number(cantidad);
            items[index].price = Number(precio.toFixed(2));
            items[index].discount = Number(descuento.toFixed(2));
            items[index].pricesinigv = Number(presiosinigv.toFixed(2));
            items[index].subtotal = Number(subtotal.toFixed(2));
            items[index].igv = Number(igvPrecio.toFixed(2));
            items[index].total = Number(totalCalculado.toFixed(2));
            // Guarda los items actualizados en el localStorage
            sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
            self.updateSecondTable();
        });
    }
    tablaProductos() {
        const self = this;
        $('#cargar_producto').click(function () {

            const items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];

            const selectedOption = $('#encabezado_orden #selectTipoManufactura').find('option:selected');
            const abreviatura = selectedOption.data('abrev');

            const $productos = $('#selectProductoItem').val();
            const $producto = $('#textDetalleProducto').val();
            const $cantidad = $('#textCantidad').val();
            const $precio = $('#textPrecio').val();

            const $EsfOD = $('#selectEsfOD').val();
            const $CilOD = $('#selectCilOD').val();
            const $AddOD = $('#selectAddOD').val();
            const $EjeOD = $('#textEjeOD').val();

            const $EsfOI = $('#selectEsfOI').val();
            const $CilOI = $('#selectCilOI').val();
            const $AddOI = $('#selectAddOI').val();
            const $EjeOI = $('#textEjeOI').val();

            const $v = $('#textV').val();
            const $h = $('#textH').val();
            const $d = $('#textD').val();
            const $pte = $('#textPte').val();
            const $alt = $('#textAlt').val();
            const $altod = $('#textAltOd').val();
            const $altoi = $('#textAltOi').val();
            
            if ($productos === '' || $productos === null) {
                toastr.error("Seleccione o Complete el campo 'Producto'");
                return;
            }
            if ($cantidad === '' || $cantidad === null) {
                toastr.error("Complete el campo 'Cantidad'");
                return;
            }
            if ($precio === '' || $precio === null) {
                toastr.error("Complete el campo 'Precio'");
                return;
            }

            const medidas = [$EsfOD, $CilOD, $AddOD, $EjeOD, $EsfOI, $CilOI, $AddOI, $EjeOI];

            if (medidas.every(value => value === "" && value === null)) {
                Swal.fire('MEDIDAS VACIAS', 'Los campos de las medidas no deben estár vacios, almenos debe de haber un campo lleno(OD,OI)', 'info');
                return;
            }

            if (abreviatura === 'STCK') {

            } else if (abreviatura === 'CONV') {

            } else if (abreviatura === 'DIG') {

                const parametros = [$v, $h, $d, $pte, $alt, $altod, $altoi];

                if (parametros.every(value => value === "" || value === null)) {
                    Swal.fire('PARAMETROS VACIOS', 'Los campos de los parametros para digitales no deben estar vacíos, en tal caso <strong>Laboratorio</strong> rechazará fabricar la orden', 'info');
                    return;
                }

                if ($EjeOD > 180 || $EjeOI > 180) {
                    Swal.fire('LIMITE DE EJE', 'Los campos ejes para digitales no deben pasar de los 180°, en tal caso <strong>Laboratorio</strong> rechazará fabricar la orden', 'info');
                    return;
                }
            }

            let $newEsfOD = ($EsfOD != "" && $EsfOD != null) ? " ESF " + $EsfOD : "";            
            let $newCilOD = ($CilOD != "" && $CilOD != null) ? " CIL " + $CilOD : "";            
            let $newAddOD = ($AddOD != "" && $AddOD != null) ? " ADD " + $AddOD : "";            
            let $newEjeOD = ($EjeOD != "" && $EjeOD != null) ? " EJE " + $EjeOD : "";
            
            let $newEsfOI = ($EsfOI != "" && $EsfOI != null) ? " ESF " + $EsfOI : "";            
            let $newCilOI = ($CilOI != "" && $CilOI != null) ? " CIL " + $CilOI : "";            
            let $newAddOI = ($AddOI != "" && $AddOI != null) ? " ADD " + $AddOI : "";            
            let $newEjeOI = ($EjeOI != "" && $EjeOI != null) ? " EJE " + $EjeOI : "";

            let descripcionOD = $newEsfOD + $newCilOD + $newAddOD + $newEjeOD;
            let descripcionOI = $newEsfOI + $newCilOI + $newAddOI + $newEjeOI;

            // Construir la descripción total condicionalmente
            let descripcionTotal = $producto;
            if (descripcionOD) {
                descripcionTotal += " " + descripcionOD;
            }
            if (descripcionOI) {
                descripcionTotal += (descripcionOD ? " || " : " ") + descripcionOI;
            }

            let $total = $cantidad * $precio;
            let sinigv = parseFloat(($precio / 118) * 100).toFixed(2);
            let subtotal = parseFloat(($total / 118) * 100).toFixed(2);
            let igvPrecio = parseFloat(($total / 118) * 18).toFixed(2);

            let commonId = Math.random().toString(36).substring(2, 9);

            items.push(
                {
                    idDetail: null,
                    idproduct:$productos,
                    quantity: $cantidad,
                    unidadmedida: 'UNI',
                    description: descripcionTotal,
                    detail_manufacturing: $producto,
                    price: Number($precio),
                    discount: 0,
                    pricesinigv: Number(sinigv),
                    subtotal: Number(subtotal),
                    igv: Number(igvPrecio),
                    total: Number($total),
                    commonId: commonId,
                    manufactura: abreviatura
                }
            );           

            let $prismaod = $('#textPrismaOD').val();
            let $prismaoi = $('#textPrismaOI').val();
            let $dip_dnp = $('#textDnp_Dip').val();
            let $dip_dnp_od = $('#textDnp_Dip_Od').val();
            let $dip_dnp_oi = $('#textDnp_Dip_Oi').val();
            let $ini_paciente = $('#textIniciales').val();
            let $diametro = $('#textDiametro').val();
            let $diametrood = $('#textDiametroOd').val();
            let $diametrooi = $('#textDiametroOi').val();
            let $corredor = $('#textCorredor').val();
            let $reduccion = $('#textReduccion').val();

            let itemsLaboratorio = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`)) || [];

            itemsLaboratorio.push(
                {
                    commonId: commonId,
                    esfod: $EsfOD,
                    cilod: $CilOD,
                    ejeod: $EjeOD,
                    addod: $AddOD,
                    prismaod: $prismaod,
                    altod: $altod,
                    dipod: $dip_dnp_od,
                    diametrood: $diametrood,
                    esfoi: $EsfOI,
                    ciloi: $CilOI,
                    ejeoi: $EjeOI,
                    addoi: $AddOI,
                    prismaoi: $prismaoi,
                    altoi: $altoi,
                    dipoi: $dip_dnp_oi,
                    diametrooi: $diametrooi,
                    v: $v,
                    h: $h,
                    d: $d,
                    pte: $pte,
                    alt: $alt,
                    dip: $dip_dnp,
                    inicialespacientes: $ini_paciente,
                    diametro: $diametro,
                    corredor: $corredor,
                    reduccion: $reduccion,
                    idDetail: null
                }
            );

            sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
            sessionStorage.setItem(`selectedUdtLaboratory`, JSON.stringify(itemsLaboratorio));
            self.updateSecondTable();
        });

        $(document).on('change', '.cantidad, .precio, .descuento', function () {
            // Encuentra la fila (tr) más cercana que contiene el input que disparó el evento
            let row = $(this).closest('tr');
            // Obtiene el índice de la fila
            let index = row.data('index');
            // Recupera los items del sessionStorage
            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`));

            // Obtiene los nuevos valores de los inputs
            let cantidad = parseFloat(row.find('.cantidad').val()) || 0.0;
            let precio = parseFloat(row.find('.precio').val()) || 0.0;
            let descuento = parseFloat(row.find('.descuento').val()) || 0.0;

            let precioDescuento = precio - descuento;
            let presiosinigv = (precioDescuento / 118) * 100;
            let totalCalculado = cantidad * precioDescuento;

            let subtotal = (totalCalculado / 118) * 100;
            let igvPrecio = (totalCalculado / 118) * 18;


            // Actualiza los valores en el array de items
            items[index].quantity = Number(cantidad);
            items[index].price = Number(precio.toFixed(2));
            items[index].discount = Number(descuento.toFixed(2));
            items[index].pricesinigv = Number(presiosinigv.toFixed(2));
            items[index].subtotal = Number(subtotal.toFixed(2));
            items[index].igv = Number(igvPrecio.toFixed(2));
            items[index].total = Number(totalCalculado.toFixed(2));
            // Guarda los items actualizados en el localStorage
            sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
            self.updateSecondTable();
        });
    }
    tablaCuotas() {
        const self = this;
        $('#agregando_cuotas').click(function () {

            let items = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`)) || [];
            let total = $('#total').val();
            let sumatotalCuotas = 0;

            items.forEach((item) => {
                sumatotalCuotas += Number(item.monto);
            });

            if (total == 0) {
                toastr.warning('Para agregar cuotas el monto del <strong>TOTAL</strong> debe ser diferente a cero. <i class="far fa-grimace"></i>');
            } else if (sumatotalCuotas == total) {
                Swal.fire('', 'La cuota o las cuotas proporcionadas se iguala al monto total, si desea añadir favor de eliminar la última cuota de la tabla. <i class="far fa-grimace"></i>', 'info');
            } else {
                $('#cuotas-modal').modal('show');
                // Obtener la fecha actual
                const fechaActual = new Date();
                // Formatear las fechas como dd/mm/yyyy
                const formatoFecha = { day: '2-digit', month: '2-digit', year: 'numeric' };
                const fechaActualFormateada = fechaActual.toLocaleDateString('es-ES', formatoFecha);

                $('#textFechaCuota').val(fechaActualFormateada);

                $textFechaCuota = $('#textFechaCuota').val();
                $('.input-group.date.textFechaCuota').datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true,
                    todayHighlight: true,
                    'language': 'es'
                }).datepicker('setDate', $textFechaCuota);
            }
        });

        $('#frmRegistrarCuotas').submit(function (e) {
            e.preventDefault();
            let datos = $(this).serialize();

            // Crear un nuevo objeto URLSearchParams
            let params = new URLSearchParams(datos);
            let numberMonto = params.get('numberMonto');
            let textFechaCuota = params.get('textFechaCuota');
            let itemsCuotas = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`)) || [];
            let fechaEmision = $('#textEmision').val();
            let totalPago = $('#total').val();

            let fechaCuota = new Date(textFechaCuota.split('/').reverse().join('-'));
            let emisionFecha = new Date(fechaEmision.split('/').reverse().join('-'));


            if (fechaCuota <= emisionFecha) {
                toastr.warning('La fecha de pago único de las cuotas no puede ser anterior o igual a la fecha de emisión. <i class="far fa-grimace"></i>');
            } else {
                let sumatotalCuotas = 0;

                itemsCuotas.forEach((item) => {
                    sumatotalCuotas += Number(item.monto);
                });

                let montoExedido = Number(numberMonto) + Number(sumatotalCuotas);

                if (montoExedido > totalPago) {
                    toastr.warning('El total de cuota no debe exeder al monto total. <i class="far fa-grimace"></i>');
                } else {
                    itemsCuotas.push(
                        {
                            idCuotas: null,
                            monto: numberMonto,
                            fecha: textFechaCuota.split('/').reverse().join('-')
                        }
                    );
                    sessionStorage.setItem(`selectedUdtCuotas`, JSON.stringify(items));
                    self.updateSecondTableCuotas();
                }
            }

        });
    }
    eliminarItems() {
        const self = this;
        $('#secondTable').on('click', '.delete-row', function () {

            let index = $(this).closest('tr').data('index');
            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`));
            let itemsLaboratory = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`)) || [];

            let itemToDelete = items[index];
            let commonId = itemToDelete.commonId;

            Swal.fire({
                title: 'Estás seguro en eliminar?',
                text: "Se eliminará el Item seleccionado",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    items.splice(index, 1); // Eliminar el elemento del array
                    if (commonId) {
                        itemsLaboratory = itemsLaboratory.filter(item => item.commonId !== commonId);
                    }

                    sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
                    sessionStorage.setItem(`selectedUdtLaboratory`, JSON.stringify(itemsLaboratory));
                    self.updateSecondTable();
                } else {
                    alertify.error('Canceló la operación');
                }
            });
        });
    }
    eliminarItemsCuotas() {
        const self = this;
        $(document).on('click', '.deleteCuota-row', function () {

            let index = $(this).closest('tr').data('index');
            let items = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`));
            items.splice(index, 1);
            sessionStorage.setItem(`selectedUdtCuotas`, JSON.stringify(items));
            self.updateSecondTableCuotas();
        });
    }
    actualizarItemProducto() {
        const self = this;
        let index = -1;
        $('#secondTable').on('click', '.update-row', function () {
            const selectedOption = $('#encabezado_orden #selectTipoManufactura').find('option:selected');
            const abreviatura = selectedOption.data('abrev');

            if (abreviatura === 'STCK') {
                $('#frmEditarItems #textPrecio').attr('disabled', false);
                $('#mostrar_parametros_udt').attr('hidden', true);
            } else {
                $('#frmEditarItems  #textPrecio').attr('disabled', true);
                $('#mostrar_parametros_udt').attr('hidden', false);
            }

            const $param = $('#encabezado_orden #selectTipoManufactura').val();

            $.ajax({
                url: 'json/ajax_producto/producto.php',
                type: 'post',
                data: { crud: 'getProductoxManufactura', tipo: $param },
                dataType: 'json'
            }).done(function (e) {
                if (e.length == 0) {
                    html = `<option value="">[-seleccione producto-]</option>`;
                } else {
                    html = `<option value="">[-seleccione producto-]</option>`;
                    for (let i = 0; i < e.length; i++) {
                        html += `<option value="${e[i].id}" data-price="${e[i].price}" data-description="${e[i].description}">${e[i].description}</option>`;
                    }
                }

                $('#frmEditarItems #selectProductoItem').html(html);
            });

            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];

            index = $(this).closest('tr').data('index');
            let selectedItem = items[index];
            if (!selectedItem) {
                Swal.fire('Error, Item no encontrado!', 'No se pudo encontrar el Item seleccionado', 'error');
                return;
            }

            let selectedUdtLaboratory = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`)) || [];
            let laboratoryItem = selectedUdtLaboratory.find(lab => lab.commonId === selectedItem.commonId);

            if (!laboratoryItem) {
                Swal.fire('Error, Laboratorio no encontrado!', 'No se pudo encontrar el Item Laboratorio seleccionado', 'error');
                return;
            }

            $('#frmEditarItems #actualizarItem').modal('show');

            $('#frmEditarItems #textDetalleProducto').val(selectedItem.detail_manufacturing);
            $('#frmEditarItems #textCantidad').val(selectedItem.quantity);
            $('#frmEditarItems #textPrecio').val(selectedItem.price);
            //$('#frmEditarItems #selectMaterial').val(selectedItem.price);
            $('#frmEditarItems #textV').val(laboratoryItem.v);
            $('#frmEditarItems #textH').val(laboratoryItem.h);
            $('#frmEditarItems #textD').val(laboratoryItem.d);
            $('#frmEditarItems #textPte').val(laboratoryItem.pte);
            $('#frmEditarItems #textAlt').val(laboratoryItem.alt);
            $('#frmEditarItems #textAltOd').val(laboratoryItem.altod);
            $('#frmEditarItems #textAltOi').val(laboratoryItem.altoi);

            const altOD = $('#frmEditarItems #textAltOd').val();
            const altOI = $('#frmEditarItems #textAltOi').val();

            if (altOD != "" || altOI != "") {
                $('#frmEditarItems #CheckAlturas').prop('checked', true);
                $('#frmEditarItems #alt_show').hide();
                $('#frmEditarItems #alt_doble').removeClass('d-none');
            }

            $('#frmEditarItems #selectEsfOD').val(laboratoryItem.esfod).trigger('change');
            $('#frmEditarItems #selectCilOD').val(laboratoryItem.cilod).trigger('change');
            $('#frmEditarItems #selectAddOD').val(laboratoryItem.addod).trigger('change');
            $('#frmEditarItems #textEjeOD').val(laboratoryItem.ejeod);
            $('#frmEditarItems #textPrismaOD').val(laboratoryItem.prismaod);

            $('#frmEditarItems #selectEsfOI').val(laboratoryItem.esfoi).trigger('change');
            $('#frmEditarItems #selectCilOI').val(laboratoryItem.ciloi).trigger('change');
            $('#frmEditarItems #selectAddOI').val(laboratoryItem.addoi).trigger('change');
            $('#frmEditarItems #textEjeOI').val(laboratoryItem.ejeoi);
            $('#frmEditarItems #textPrismaOI').val(laboratoryItem.prismaoi);

            $('#frmEditarItems #textDnp_Dip').val(laboratoryItem.dip);
            $('#frmEditarItems #textDnp_Dip_Od').val(laboratoryItem.dipod);
            $('#frmEditarItems #textDnp_Dip_Oi').val(laboratoryItem.dipoi);

            const dipOD = $('#frmEditarItems #textDnp_Dip_Od').val();
            const dipOI = $('#frmEditarItems #textDnp_Dip_Oi').val();
            if (dipOD != "" || dipOI != "") {
                $('#frmEditarItems #CheckDips').prop('checked', true);
                $('#frmEditarItems #show_dip').hide();
                $('#frmEditarItems #dual_dip').removeClass('d-none');
            }

            $('#frmEditarItems #textIniciales').val(laboratoryItem.inicialespacientes);

            $('#frmEditarItems #textDiametro').val(laboratoryItem.diametro);
            $('#frmEditarItems #textDiametro').val(laboratoryItem.diametrood);
            $('#frmEditarItems #textDiametro').val(laboratoryItem.diametrooi);

            const diametroOD = $('#frmEditarItems #textDiametro').val();
            const diametroOI = $('#frmEditarItems #textDiametro').val();
            if (diametroOD != "" || diametroOI != "") {
                $('#frmEditarItems #CheckDiametro').prop('checked', true);
                $('#frmEditarItems #show_diametro').hide();
                $('#frmEditarItems #diametro_dual').removeClass('d-none');
            }
            $('#frmEditarItems #textDiametro').val(laboratoryItem.diametro);
            $('#frmEditarItems #textCorredor').val(laboratoryItem.corredor);
            $('#frmEditarItems #textReduccion').val(laboratoryItem.reduccion);


        });

        $('#frmEditarItems #update_item').click(function () {
            if (index === -1) {
                Swal.fire('Error, Índice no válido!', 'No se pudo encontrar el índice seleccionado', 'error');
                return;
            }

            let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];
            let selectedItem = items[index];

            if (!selectedItem) {
                Swal.fire('Error, Item no encontrado!', 'No se pudo encontrar el Item seleccionado', 'error');
                return;
            }

            let selectedUdtLaboratory = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`)) || [];
            let laboratoryItem = selectedUdtLaboratory.find(lab => lab.commonId === selectedItem.commonId);

            if (!laboratoryItem) {
                Swal.fire('Error, Laboratorio no encontrado!', 'No se pudo encontrar el Item Laboratorio seleccionado', 'error');
                return;
            }

            let newProducto = $('#frmEditarItems #textDetalleProducto').val();

            let newEsfOD = $('#frmEditarItems #selectEsfOD').val();
            let $newEsfOD = (newEsfOD != "" && newEsfOD != null) ? " ESF " + newEsfOD : "";
            let newCilOD = $('#frmEditarItems #selectCilOD').val();
            let $newCilOD = (newCilOD != "" && newCilOD != null) ? " CIL " + newCilOD : "";
            let newAddOD = $('#frmEditarItems #selectAddOD').val();
            let $newAddOD = (newAddOD != "" && newAddOD != null) ? " ADD " + newAddOD : "";
            let newEjeOD = $('#frmEditarItems #textEjeOD').val();
            let $newEjeOD = (newEjeOD != "" && newEjeOD != null) ? " EJE " + newEjeOD : "";

            let newEsfOI = $('#frmEditarItems #selectEsfOI').val();
            let $newEsfOI = (newEsfOI != "" && newEsfOI != null) ? " ESF " + newEsfOI : "";
            let newCilOI = $('#frmEditarItems #selectCilOI').val();
            let $newCilOI = (newCilOI != "" && newCilOI != null) ? " CIL " + newCilOI : "";
            let newAddOI = $('#frmEditarItems #selectAddOI').val();
            let $newAddOI = (newAddOI != "" && newAddOI != null) ? " ADD " + newAddOI : "";
            let newEjeOI = $('#frmEditarItems #textEjeOI').val();
            let $newEjeOI = (newEjeOI != "" && newEjeOI != null) ? " EJE " + newEjeOI : "";

            let newDescripcionOD = $newEsfOD + $newCilOD + $newAddOD + $newEjeOD;
            let newDescripcionOI = $newEsfOI + $newCilOI + $newAddOI + $newEjeOI;

            // Construir la descripción total condicionalmente
            let newDescripcionTotal = newProducto;
            if (newDescripcionOD) {
                newDescripcionTotal += " " + newDescripcionOD;
            }
            if (newDescripcionOI) {
                newDescripcionTotal += (newDescripcionOD ? " || " : " ") + newDescripcionOI;
            }

            let newCantidad = $('#frmEditarItems #textCantidad').val();
            let newPrecio = $('#frmEditarItems #textPrecio').val();

            let newTotal = newCantidad * newPrecio;
            let newSinIgv = parseFloat((newPrecio / 118) * 100).toFixed(2);
            let newSubTotal = parseFloat((newTotal / 118) * 100).toFixed(2);
            let newIgvPrecio = parseFloat((newTotal / 118) * 18).toFixed(2);

            items[index].description = newDescripcionTotal;
            items[index].detail_manufacturing = newProducto;
            items[index].quantity = Number(newCantidad);
            items[index].price = Number(newPrecio);
            items[index].pricesinigv = Number(newSinIgv);
            items[index].subtotal = Number(newSubTotal);
            items[index].igv = Number(newIgvPrecio);
            items[index].total = Number(newTotal);

            let newV = $('#frmEditarItems #textV').val();
            let newH = $('#frmEditarItems #textH').val();
            let newD = $('#frmEditarItems #textD').val();
            let newPte = $('#frmEditarItems #textPte').val();
            let newAlt = $('#frmEditarItems #textAlt').val();
            let newAltod = $('#frmEditarItems #textAltOd').val();
            let newAltoi = $('#frmEditarItems #textAltOi').val();

            let newPrismaod = $('#frmEditarItems #textPrismaOD').val();
            let newPrismaoi = $('#frmEditarItems #textPrismaOI').val();
            let newDip_dnp = $('#frmEditarItems #textDnp_Dip').val();
            let newDip_dnp_od = $('#frmEditarItems #textDnp_Dip_Od').val();
            let newDip_dnp_oi = $('#frmEditarItems #textDnp_Dip_Oi').val();
            let newIni_paciente = $('#frmEditarItems #textIniciales').val();
            let newDiametro = $('#frmEditarItems #textDiametro').val();
            let newDiametrood = $('#frmEditarItems #textDiametroOd').val();
            let newDiametrooi = $('#frmEditarItems #textDiametroOi').val();
            let newCorredor = $('#frmEditarItems #textCorredor').val();
            let newReduccion = $('#frmEditarItems #textReduccion').val();

            laboratoryItem.esfod = newEsfOD;
            laboratoryItem.cilod = newCilOD;
            laboratoryItem.addod = newAddOD;
            laboratoryItem.ejeod = newEjeOD;
            laboratoryItem.prismaod = newPrismaod;
            laboratoryItem.esfoi = newEsfOI;
            laboratoryItem.ciloi = newCilOI;
            laboratoryItem.addoi = newAddOI;
            laboratoryItem.ejeoi = newEjeOI;
            laboratoryItem.prismaoi = newPrismaoi;

            laboratoryItem.v = newV;
            laboratoryItem.h = newH;
            laboratoryItem.d = newD;
            laboratoryItem.pte = newPte;
            laboratoryItem.alt = newAlt;
            laboratoryItem.altod = newAltod;
            laboratoryItem.altoi = newAltoi;
            laboratoryItem.dip = newDip_dnp;
            laboratoryItem.dipod = newDip_dnp_od;
            laboratoryItem.dipoi = newDip_dnp_oi;
            laboratoryItem.inicialespacientes = newIni_paciente;
            laboratoryItem.diametro = newDiametro;
            laboratoryItem.diametrood = newDiametrood;
            laboratoryItem.diametrooi = newDiametrooi;
            laboratoryItem.corredor = newCorredor;
            laboratoryItem.reduccion = newReduccion;

            sessionStorage.setItem(`selectedUdtItems`, JSON.stringify(items));
            sessionStorage.setItem(`selectedUdtLaboratory`, JSON.stringify(selectedUdtLaboratory));
            self.updateSecondTable();
            $('#frmEditarItems #actualizarItem').modal('hide');
        });
    }
    updateSecondTable() {
        let items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`)) || [];
        let tbody = $('#secondTable tbody');
        tbody.empty(); // Limpiar la tabla antes de actualizar

        let sumatotal = 0;

        items.forEach((item, index) => {
            let isProduct = item.commonId !== null;

            let row = `<tr data-index="${index}">
                <td class="text-center" style="width:5%">
                    <button class="btn btn-outline-danger delete-row"><i class="fas fa-trash"></i></button>
                    ${isProduct ? '<button class="btn btn-outline-info update-row"><i class="fa fa-pencil"></i></button>' : ''}
                </td>
                <td style="width:5%">
                    <input type="number" min="1" class="form-control text-center cantidad" value="${item.quantity}">
                </td>
                <td class="text-center" style="width:5%">${item.unidadmedida}</td>
                <td style="50%">${item.description}</td>
                <td style="width:5%">
                    <input type="number" step="0.1" min="0" class="form-control text-center precio" value="${item.price}">
                </td>
                <td style="width:5%">
                    <input type="number" step="0.1" min="0" class="form-control text-center descuento" value="${item.discount}">
                </td>
                <td class="text-center align-content-center" style="width:5%">${item.total}</td>                    
            </tr>`;
            tbody.append(row);

            sumatotal += Number(item.total);
        });

        let subtotal = (sumatotal / 118) * 100;
        let igvPrecio = (sumatotal / 118) * 18;

        $('#sub_total').val(subtotal.toFixed(2));
        $('#igv').val(igvPrecio.toFixed(2));
        $('#total').val(sumatotal.toFixed(2));
    }
    updateSecondTableCuotas() {
        let items = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`)) || [];
        let tbody = $('#secondTableCuotas tbody');
        tbody.empty();

        items.forEach((item, index) => {
            let partes = item.fecha.split('-');
            let año = partes[0];
            let mes = partes[1];
            let día = partes[2];
            let fechaFinal = `${día}-${mes}-${año}`;

            let row = `<tr data-index="${index}">
                <td>${fechaFinal}</td>
                <td>${item.monto}</td>                    
                <td class="text-center" style="width:5%">
                    <button class="btn btn-outline-danger deleteCuota-row"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            `;
            tbody.append(row);
        });
    }
    onUpdateOrdenTrabajoFromSubmit() {
        $('#btnUpdateOrdenTrabajo').click(function () {
            /* let $idcliente = $('#selectCliente').val();
            if ($idcliente === null || $idcliente === "") {
                toastr.error('Se Necesita seleccionar el <strong>Código del Cliente</strong> <i class="far fa-angry"></i>');
                return;
            } */
            let $cliente = $('#textCliente').val();
            if ($cliente === null || $cliente === "") {
                toastr.error('la casilla <strong>Clientes</strong> debe estar lleno <i class="far fa-angry"></i>');
                return;
            }
            let $iddocumento = $('#selectTipoDocumento').val();
            if ($iddocumento === null || $iddocumento === "") {
                toastr.error('No ha seleccionado <strong>El Tipo de Documento</strong> <i class="far fa-angry"></i>');
                return;
            }
            let $numerodocumento = $('#textNDocumento').val();
            if ($numerodocumento === null || $numerodocumento === "") {
                toastr.error('la casilla <strong>Documento</strong> debe estar lleno <i class="far fa-angry"></i>');
                return;
            }
            let $direccion = $('#textDireccion').val();
            let $idtipomanufacturacion = $('#selectTipoManufactura').val();
            if ($idtipomanufacturacion === null || $idtipomanufacturacion === "") {
                toastr.error('No ha seleccionado <strong>El Tipo de Manufacturación</strong> <i class="far fa-angry"></i>');
                return;
            }
            let $fechaemision = $('#textEmision').val();
            if ($fechaemision === null || $fechaemision === "") {
                toastr.error('La <strong>Fecha de Emisión</strong> está vacio <i class="far fa-angry"></i>');
                return;
            }
            let $tiempoentrega = $('#textTiempoEntrega').val();
            if ($tiempoentrega === null || $tiempoentrega === "") {
                toastr.error('El <strong>Tiempo de Entrega</strong> está vacio <i class="far fa-angry"></i>');
                return;
            }
            let $idmensajero = $('#selectMensajero').val();
            let $idvendedor = $('#selectRecepcionado').val();
            if ($idvendedor === null || $idvendedor === "") {
                toastr.error('No ha seleccionado <strong>Al Vendedor</strong> <i class="far fa-angry"></i>');
                return;
            }
            let $idsede = $('#selectSede').val();
            if ($idsede === null || $idsede === "") {
                toastr.error('No ha seleccionado <strong>La Sede</strong> <i class="far fa-angry"></i>');
                return;
            }
            let $formapago = $('#selectFormaPago').val();
            if ($formapago === "CRÉDITO") {
                let $cuotas = JSON.parse(sessionStorage.getItem('selectedUdtCuotas'));
                if ($cuotas === null) {
                    toastr.error('El registro de <strong>las cuotas</strong> están vacios <i class="far fa-angry"></i>');
                    return;
                } else if ($cuotas.length === 0) {
                    toastr.error('El registro de <strong>las cuotas</strong> están vacios <i class="far fa-angry"></i>');
                    return;
                }
            }

            let $observacion = $('#textObservacion').val();
            let $subtotal = $('#sub_total').val();
            let $igv = $('#igv').val();
            let $total = $('#total').val();
            let $adelanto = $('#adelanto').val();
            let $saldo = $('#saldo').val();
            let $pendientepago = $('#flexCheckDefault');
            if ($pendientepago.is(':checked')) {
                $pendientepago = 1;
            } else {
                $pendientepago = 0
            }

            let $items = JSON.parse(sessionStorage.getItem(`selectedUdtItems`));
            let $descripcionLimpia = "";
            if ($items === null) {
                toastr.error('La tabla de los productos están vacios <i class="far fa-angry"></i>');
                return;
            } else if ($items.length === 0) {
                toastr.error('La tabla de los productos están vacios <i class="far fa-angry"></i>');
                return;
            } else {
                let descripcionTotal = "";
                $items.forEach(function (item) {
                    descripcionTotal += item.detail_manufacturing + " || ";
                });
                $descripcionLimpia = descripcionTotal.trim().slice(0, -3);
            }

            let $itemsLaboratory = JSON.parse(sessionStorage.getItem(`selectedUdtLaboratory`));
            if ($itemsLaboratory === null) {
                $itemsLaboratory = [];
            } else if ($itemsLaboratory.length === 0) {
                $itemsLaboratory = [];
            }

            let $itemsCuotas = JSON.parse(sessionStorage.getItem(`selectedUdtCuotas`));
            if ($itemsCuotas === null) {
                $itemsCuotas = [];
            } else if ($itemsCuotas.length === 0) {
                $itemsCuotas = [];
            }

            let param = sessionStorage.getItem('datos').toString();

            const $datos = {
                param: param,
                cliente: $cliente,
                iddocumento: $iddocumento,
                numerodocumento: $numerodocumento,
                direccion: $direccion,
                idtipomanufacturacion: $idtipomanufacturacion,
                fechaemision: $fechaemision,
                tiempoentrega: $tiempoentrega,
                idmensajero: $idmensajero,
                idvendedor: $idvendedor,
                idsede: $idsede,
                formapago: $formapago,
                observacion: $observacion,
                subtotal: $subtotal,
                igv: $igv,
                total: $total,
                adelanto: $adelanto,
                saldo: $saldo,
                pendientepago: $pendientepago,
                descripcionTotal: $descripcionLimpia,
                items: $items,
                laboratory: $itemsLaboratory,
                cuotas: $itemsCuotas,
                crud: "update"
            };


            Swal.fire({
                title: '<strong>ACTUALIZAR ORDEN DE TRABAJO</strong>',
                text: "Revisar antes de actualizar!.Si todo es conforme hacer clic en 'Aceptar'",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'json/ajax_cotizacion/cotizacion.php',
                        type: 'post',
                        data: $datos,
                        dataType: 'json',
                        beforeSend: function () {
                            $('#loading').show();
                        },
                        success: function (e) {
                            if (e.responseJson == "no server") {
                                $('#loading').hide();
                                Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
                            } else if (e.responseJson == "error") {
                                $('#loading').hide();
                                Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                            } else {
                                if (e.message == "Unauthenticated.") {
                                    $('#loading').hide();
                                    Swal.fire({
                                        title: 'EL TOKEN HA SIDO ELIMINADO',
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
                                        setTimeout(function () {
                                            $('#loading').hide();
                                            location.href = 'ordenes-trabajo';
                                        }, 2000);
                                    }
                                } else {
                                    if (e.errors[0] == "No se pudo conectar a la base de datos") {
                                        $('#loading').hide();
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
                                        $('#loading').hide();
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
                                    } else if (e.errors[0] == "Error al actualizar el registro.") {
                                        Swal.fire('Incorrecto!', e.message, 'warning');
                                        $('#loading').hide();
                                    } else {
                                        if (e.alert == "rules") {
                                            Swal.fire('Incorrecto!', e.errors[0], 'warning');
                                            $('#loading').hide();
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
                        sessionStorage.removeItem('selectedUdtCuotas');
                        sessionStorage.removeItem('selectedUdtItems');
                        sessionStorage.removeItem('selectedUdtLaboratory');
                        sessionStorage.removeItem('datos');
                        sessionStorage.removeItem('pageInstanceId');
                    });
                } else {
                    alertify.error('Canceló la operación');
                }
            });
        });
    }
    btnBack() {
        $('#btn_retroceder,#btn_cancelar').click(function () {
            sessionStorage.removeItem('selectedUdtCuotas');
            sessionStorage.removeItem('selectedUdtItems');
            sessionStorage.removeItem('selectedUdtLaboratory');
            sessionStorage.removeItem('pageInstanceId');
            sessionStorage.removeItem('datos');
        });
    }
}