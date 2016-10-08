import { Injectable } from '@angular/core';
import { Http }from '@angular/http';
import { User } from './../../models/user';
import { BaseRestClient } from './base.rest-client';


@Injectable()
export class AuthRestClient extends BaseRestClient {

    constructor(public http: Http) {
        super(http);
    }

    createSession(user: User): void {
        console.log(this.post('/session', user).subscribe());
    }
}
