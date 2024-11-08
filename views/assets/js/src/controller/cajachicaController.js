class CajachicaController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        window.actualizarCajachica = this.actualizarCajachica.bind(this);
        window.visualizarCajachica = this.visualizarCajachica.bind(this);
        window.eliminarCajachica = this.eliminarCajachica.bind(this);
    }

    onCreateCajachicaFormSubmit() {
        const self = this;
        const $form = this.view.formRegistrarCajachica;
        const formData = new FormData($form[0]);
        formData.append('crud', 'create');

        $.ajax({
            url: 'json/ajax_cajachica/cajachica.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function () {
                $("#frmRegistrarCajachica #spinnerButton").show();
                $("#frmRegistrarCajachica #btnCajachica").attr("disabled", true);
            },
            success: function (e) {
                if (e.responseJson == "no server") {
                    Swal.fire('Error!', 'Se perdió la conexión con el servidor', 'error');
                } else if (e.responseJson == "error") {
                    Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
                } else {
                    if (e.message == "Unauthenticated.") {
                        Swal.fire({
                            title: 'Parece que el token ha sido eliminado',
                            text: "Haga click en Aceptar para poder restablecer el token!",
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = 'logout';
                            }
                        });
                    } else if (e.status) {
                        if (e.message == "Registro Generado.") {
                            toastr.success(e.message);
                            self.tblListCajachica.ajax.reload();
                            $("#frmRegistrarCajachica")[0].reset();
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
                $("#frmRegistrarCajachica #btnCajachica").removeAttr("disabled");
                $("#frmRegistrarCajachica #spinnerButton").hide();
            },
        }).done(function () {
            $("#frmRegistrarCajachica #btnCajachica").removeAttr("disabled");
            $("#frmRegistrarCajachica #spinnerButton").hide();
        });
    }
    onUpdateCajachicaFormSubmit() {
        const self = this;
        const $form = this.view.formActualizarCajachica;
        const formData = new FormData($form[0]);
        var $param = $("#param").val();
        formData.append('crud', 'update');
        formData.append("param", $param);
        
        $.ajax({
            url: 'json/ajax_cajachica/cajachica.php',
            type: 'POST',
            data:formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function () {
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
                            self.tblListCajachica.ajax.reload();
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
                } else if (e.id != null && e.id !== "") {
                    $("#frmActualizarCajachica #param").val(e.id);
                    $("#frmActualizarCajachica #textDescription").val(e.description);
                    $("#frmActualizarCajachica #amount").val(e.amount);
                    $("#frmActualizarCajachica #textImg").val(e.img_petty_cash_name);
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
                } else if (e.id != null && e.id !== "") {

                    if (e.time == "" || e.time == null) {
                        $("#info-modal #textFechaHora").html("--------");
                    } else {
                        const dateParts = e.date.split('-');
                        const formattedDate = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
                        $("#info-modal #textFechaHora").html(formattedDate + " " + e.time);
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

                    // Obtener el nombre del archivo y URL
                const fileName = e.img_petty_cash_name; // El nombre del archivo, ej. "documento.jpg"
                const fileUrl = e.img_petty_cash_url;  // La URL completa del archivo
                console.log("Nombre del archivo:", fileName);
                console.log("URL del archivo:", fileUrl);

                // Extraer la extensión del archivo
                const fileExtension = fileName.split('.').pop().toLowerCase();

                // Asignar el tipo MIME basado en la extensión
                let fileType = "";

                switch (fileExtension) {
                    case "jpg":
                    case "jpeg":
                        fileType = "image/jpeg";
                        break;
                    case "png":
                        fileType = "image/png";
                        break;
                    case "webp":
                        fileType = "image/webp";
                        break;
                    case "pdf":
                        fileType = "application/pdf";
                        break;
                    case "doc":
                    case "docx":
                        fileType = "application/msword";
                        break;
                    default:
                        fileType = "unknown";
                        break;
                }

                // Verificar el tipo y mostrar el archivo correctamente
                if (!fileUrl || fileUrl === "") {
                    $("#info-modal #filePreview").html('No se ha recibido un archivo.');
                } else {
                    // Limpiar cualquier contenido previo
                    $("#info-modal #filePreview").html("");

                    if (fileType == "image/jpeg" || fileType == "image/png" || fileType == "image/webp") {
                        const imageHtml = `
                            <p class="text-secondary mb-0" style="font-size: small;">Abrir imagen</p>
                            <a href="${fileUrl}" target="_blank" class="btn btn-primary mt-2"><i class="fas fa-expand"></i></a>
                            <br><br>
                            <img src="${fileUrl}" class="img-fluid" alt="Imagen de Caja Chica" />
                        `;
                        $("#info-modal #filePreview").html(imageHtml);
                    } else if (fileType == "application/pdf") {
                        const pdfHtml = `
                            <p class="text-secondary mb-0" style="font-size: small;">Abrir documento PDF</p>
                            <a href="${fileUrl}" target="_blank" class="btn btn-primary mt-2"><i class="fas fa-eye"></i></a>
                            <br><br>
                            <embed src="${fileUrl}" type="application/pdf" width="100%" height="500px" />`;
                        $("#info-modal #filePreview").html(pdfHtml);
                    } else if (fileType == "application/msword") {
                        const wordHtml = `
                            <p class="text-secondary mb-0" style="font-size: small;">Decargar documento Word</p>
                            <a href="${fileUrl}" target="_blank" class="btn btn-primary mt-2"><i class="fas fa-arrow-down"></i></a>
                        `;
                        $("#info-modal #filePreview").html(wordHtml);
                    } else {
                        // Si el archivo no es soportado, mostrar un mensaje
                        console.log("Tipo de archivo no soportado:", fileType);
                        $("#info-modal #filePreview").html('El archivo no es soportado para vista previa.');
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

                        } else if (e.message == "Registro eliminado exitosamente.") {
                            Swal.fire(
                                'Eliminado',
                                'El registro fué eliminado permanentemente.',
                                'success'
                            );
                            self.tblListCajachica.ajax.reload();
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
                { 'data': 'date' },
                { 'data': 'time' },
                { 'data': 'username' },
                { 'data': 'description' },
                { 'data': 'amount' },
                { 'data': 'acciones' }
            ]
        });
    }
}