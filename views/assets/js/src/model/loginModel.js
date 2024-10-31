class LoginModel {
    constructor() {
        this.username = "";
        this.password = "";
        this.crud = "loginAdmin";
    }

    setCredentials(username, password) {
        this.username = username;
        this.password = password;
    }

    getFormData() {
        return {
            username: this.username,
            password: this.password,
            crud: this.crud,
        };
    }
}