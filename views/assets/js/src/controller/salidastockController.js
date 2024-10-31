class SalidastockController {
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }

    exportarExcel() {
        $('#btn_Items').on('click', function () {
            const selectManufacatura = $('#frmRegistrarSalidaStock #selectManufacturaStock').val();
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
                    link.download = 'Productos_Almacen_Salidas.xlsx'; // Nombre del archivo para descargar
                    link.click();
                },
                error: function (e) {
                    Swal.fire('Error!', e.responseText, 'error');
                }
            });
        });
    }

    onChargeSalidaCantidad() {
        const localPrincipal = JSON.parse(localStorage.getItem('empleado'));

        const $datos = new FormData($(frmRegistrarSalidaStock)[0]);
        $datos.append('local', localPrincipal.idstore);
        $datos.append('crud', 'chargeStock');

        $.ajax({
            url: 'json/ajax_salida/salidaCargarExcel.php',
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