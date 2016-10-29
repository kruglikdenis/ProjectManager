import { Injectable } from '@angular/core';
import { AuthUser } from './../models/auth-user';
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

    login(user: AuthUser) {
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

    isAuthorized() {
        if (this.getSession()) {
            return true;
        }

        return false;
    }

    isAdmin() {
        let session = this.getSession();
        if (session) {
            return (session.roles.indexOf('ROLE_ADMIN') >= 0);
        }

        return false;
    }

    getSession() {
        return this.storageService.getSession();
    }
}
