import { Injectable } from '@angular/core';
import { AuthUser } from '../models/auth-user';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { UsersTransformer } from '../api/transformers/users.transformer';

@Injectable()
export class UserService {
    private USERS_URL: string = '/users';

    constructor(
        private restClient: BaseRestClient,
        private usersTransformer: UsersTransformer
    ) {}

    register(user: AuthUser) {
        return this.restClient.post(this.USERS_URL, user);
    }

    search(name = '', limit = 10, offset = 0) {
        let params = { name, limit, offset };

        return this.restClient
            .get(this.USERS_URL, params, this.usersTransformer);
    }
}
