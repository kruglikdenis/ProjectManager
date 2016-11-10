export class FormErrors {
    email: string;
    password: string;
    repeatPassword: string;

    constructor() {
        this.email = '';
        this.password = '';
        this.repeatPassword = '';
    }
}
