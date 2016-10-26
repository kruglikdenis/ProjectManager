import { Injectable } from '@angular/core';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { UsersTransformer } from '../api/transformers/users.transformer';

@Injectable()
export class UserService {
    private USERS_URL: string = '/users';

    constructor(
        private restClient: BaseRestClient,
        private usersTransformer: UsersTransformer,
    ) {}

    getUsers({name = '', limit = 10, offset = 0} = {}) {
        return this.restClient
            .get(this.USERS_URL, {name, limit, offset}, this.usersTransformer)
            .then(users => {
                console.log(users);
                return users;
            });
    }
}
