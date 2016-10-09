export class Session {
    id: number;
    email: string;
    roles: Array<string>;
    token: string;

    constructor(token = '') {
        this.token = token;
    }
}
