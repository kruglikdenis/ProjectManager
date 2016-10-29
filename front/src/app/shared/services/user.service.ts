import { Injectable } from '@angular/core';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { UsersTransformer } from '../api/transformers/users.transformer';

@Injectable()
export class UserService {
    private USERS_URL: string = '/users';

    constructor(
        private restClient: BaseRestClient,
        private usersTransformer: UsersTransformer
    ) {}

    search(name = '', limit = 10, offset = 0) {
        let params = { name, limit, offset };
        
        return this.restClient
            .get(this.USERS_URL, params, this.usersTransformer);
    }
}
