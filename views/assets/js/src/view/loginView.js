class LoginView {
    constructor(controller) {
        this.controller = controller;
        this.form = document.getElementById("frmLogin");
        this.resultado = document.getElementById("resultado");
        this.spinner = document.getElementById("spinnerLogin");
        
        this.form.addEventListener("submit", (e) => {
            e.preventDefault();  // Asegúrate de que esto está presente
            this.controller.onSubmit(e);
        });

    }

    disableSubmitButton() {
        this.form.querySelector('[type="submit"]').disabled = true;
    }

    showSpinner() {
        this.spinner.style.display = "inline-block";
    }

    updateResult(message) {
        this.resultado.textContent = message;
    }

    hideSpinner() {
        this.form.querySelector('[type="submit"]').disabled = false;
        this.spinner.style.display = "none";
    }
}