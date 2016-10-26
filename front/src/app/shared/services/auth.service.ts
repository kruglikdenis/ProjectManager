import { Injectable } from '@angular/core';
import { User } from './../models/user';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { StorageService } from '../../shared/services/storage.service';
import { SessionTransformer } from '../api/transformers/session.transformer';
import { Router } from '@angular/router';

@Injectable()
export class AuthService {
    private SESSIONS_URL: string = '/sessions';

    constructor(
        private restClient: BaseRestClient,
        private storageService: StorageService,
        private sessionTransformer: SessionTransformer,
        private router: Router
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
            .then(() => {
                this.storageService.deleteSession();
                this.router.navigate(['/']);
            });
    }

    get store() {
        return this.storageService.getSession();
    }

    isAuthorized() {
        return this.store;
    }

    isAdmin() {
        if (this.store) {
            return this.store.user.roles[0] === 'ROLE_ADMIN';
        }

        return false;
    }

    get firstName () {
        if (this.store) {
            return this.store.user.email;
        }
    }
}
