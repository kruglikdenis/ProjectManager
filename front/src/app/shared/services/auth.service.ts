import { Injectable, EventEmitter, Output } from '@angular/core';
import { User } from './../models/user';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { StorageService } from '../../shared/services/storage.service';
import { SessionTransformer } from '../api/transformers/session.transformer';


@Injectable()
export class AuthService {
    @Output() authorizedEvent = new EventEmitter();

    private SESSIONS_URL: string = '/sessions';

    constructor(
        private restClient: BaseRestClient,
        private storageService: StorageService
    ) {}

    login(user: User) {
        return this.restClient
            .setTransformer(new SessionTransformer())
            .post(this.SESSIONS_URL, user)
            .then(session => {
                this.storageService.saveSession(session);
                this.authorizedEvent.emit({session});

                return session;
            });
    }
}
