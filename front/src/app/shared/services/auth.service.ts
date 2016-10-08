import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { User } from './../models/user';
import { AuthRestClient } from '../api/clients/auth.rest-client';

@Injectable()
export class AuthService {
    constructor(private restClient: AuthRestClient) {}

    login(user: User): void {
        this.restClient.createSession(user);
    }
}
