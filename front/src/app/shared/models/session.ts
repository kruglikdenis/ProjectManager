import { User } from './user';

export class Session {
    token: string;
    user: User;

    constructor(token = '', user: User) {
        this.token = token;
        this.user = user;
    }
}
