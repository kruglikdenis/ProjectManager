export class User {
    id: number;
    email: string;
    password: string;
    roles: Array<string>;

    constructor(id = 0, email = '', roles = [], password = '') {
        this.id = id;
        this.email = email;
        this.password = password;
        this.roles = roles;
    }
}
