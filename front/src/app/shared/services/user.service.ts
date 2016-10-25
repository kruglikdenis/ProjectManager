import { Injectable } from '@angular/core';
import { BaseRestClient } from '../api/clients/base.rest-client';

@Injectable()
export class UserService {
    private USERS_URL: string = '/users';

    constructor(
        private restClient: BaseRestClient
    ) {}

    getUsers({name, limit, offset} = {}) {
        return this.restClient
            .get(this.USERS_URL, {name, limit, offset})
            .then(users => {
                return users;
            });
    }
}
