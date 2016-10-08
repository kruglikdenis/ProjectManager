import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { User } from './../models/user';

@Injectable()
export class AuthService {
    constructor(private http: HTTP) {}

    login(user: User): void {
        console.log(this.http);
    }
}
