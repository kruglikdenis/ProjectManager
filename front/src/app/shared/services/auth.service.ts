import { Injectable } from '@angular/core';
import { User } from './../models/user';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { StorageService } from '../../shared/services/storage.service';
import { SessionTransformer } from '../api/transformers/session.transformer';

@Injectable()
export class AuthService {
    private SESSIONS_URL: string = '/sessions';

    constructor(
        private restClient: BaseRestClient,
        private storageService: StorageService
    ) {}

    login(user: User) {
        return this.restClient
            .setTransformer(new SessionTransformer())
            .post(this.SESSIONS_URL, user)
            .then(data => {
                return data;
            });
    }
}
