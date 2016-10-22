export class User {
    id: number;
    email: string;
    password: string;

    constructor(id = 0, email = '', password = '') {
        this.id = id;
        this.email = email;
        this.password = password;
    }
}
