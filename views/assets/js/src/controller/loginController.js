class LoginController {
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }

    onSubmit() {
        this.view.disableSubmitButton();

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        this.model.setCredentials(username, password);

        const formData = this.model.getFormData();

        this.view.showSpinner();

        // Hacer la solicitud AJAX
        $.ajax({
            url: 'json/ajax_login/login.php',
            type: 'post',
            data: formData,
            dataType: 'json'
        })
            .done((response) => this.handleResponse(response))
            .always(() => this.view.hideSpinner());
    }

    handleResponse(e) {
        if (e.responseJson == "no server") {
            Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');
        } else if (e.responseJson == "error") {
            Swal.fire('Error!', 'Error en la solicitud AJAX', 'error');
        } else {
            if (e.status) {
                if (e.data.employee !== null) {
                    let fullName = `${e.data.employee.lastname}, ${e.data.employee.name} `;
                    let storeId = e.data.employee.store.id;
                    let localprincipal = e.data.employee.store.main;
                    let vendorId = e.data.employee.id;

                    localStorage.setItem('empleado', JSON.stringify({
                        nombrecompleto: fullName,
                        vendedor: vendorId,
                        idstore: storeId,
                        localprincipal: localprincipal
                    }));
                }

                window.location = "dashboard";
            } else {
                if (e.errors[0] == "No se pudo conectar a la base de datos") {
                    Swal.fire('Error!', e.message, 'error');
                } else if (e.errors[0] == "mantenimiento.") {
                    Swal.fire(e.message + ' <i class="far fa-grin-beam-sweat"></i>', '', 'info');
                } else if (e.errors[0] == "usuario incorrecto") {
                    Swal.fire('Incorrecto!', e.message, 'warning');
                } else if (e.errors[0] == "Contraseña incorrecta") {
                    Swal.fire('Incorrecto!', e.message, 'warning');
                } else {
                    if (e.alert == "rules") {
                        Swal.fire('Incorrecto!', e.errors[0], 'warning');
                    }
                }
            }
        }

    }
}