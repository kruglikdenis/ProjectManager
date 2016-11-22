import { Component } from '@angular/core';
import { BaseRestClient } from './shared/api/clients/base.rest-client';
import { StorageService } from './shared/services/storage.service';
import { AuthService } from './shared/services/auth.service';
import { UserService } from './shared/services/user.service';
import { ProjectService } from './shared/services/project.service';
import { ModalService } from './shared/services/modal.service';
import { SessionTransformer } from './shared/api/transformers/session.transformer';
import { UsersTransformer } from './shared/api/transformers/users.transformer';
import { ProjectListTransformer } from './shared/api/transformers/project-list.transformer';

import '../style/app.scss';



@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
    providers: [
        BaseRestClient,
        StorageService,
        AuthService,
        UserService,
        ProjectService,
        SessionTransformer,
        UsersTransformer,
        ProjectListTransformer,

        ModalService
    ]
})
export class AppComponent {
    isOpenLoginModal: boolean;

    constructor (private authService: AuthService) {
        this.isOpenLoginModal = false;
    }

    openLoginModal() {
        this.isOpenLoginModal = true;
    }

    get isAuthorized() {
        return this.authService.isAuthorized();
    }
}
