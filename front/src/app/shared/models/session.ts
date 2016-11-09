export class Session {
    userId: number;
    token: string;
    email: string;
    roles: Array<string>;

    constructor(userId = 0, token = '', email = '', roles = []) {
        this.userId = userId;
        this.token = token;
        this.email = email;
        this.roles = roles;
    }
}
