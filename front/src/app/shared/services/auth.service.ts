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
        private storageService: StorageService,
        private sessionTransformer: SessionTransformer
    ) {}

    login(user: User) {
        return this.restClient
            .post(this.SESSIONS_URL, user, this.sessionTransformer)
            .then(session => {
                this.storageService.saveSession(session);

                return session;
            });
    }

    logout() {
        return this.restClient.delete(this.SESSIONS_URL)
            .then(() => this.storageService.deleteSession());
    }

    isAuthorized() {
        if (this.storageService.getSession()) {
            return true;
        }

        return false;
    }
}
