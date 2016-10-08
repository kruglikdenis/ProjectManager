import { Injectable } from '@angular/core';
import { User } from './../models/user';

@Injectable()
export class AuthService {
    constructor() {

    }

    login(user: User) {
        console.log(user);
    }
}
