import { Component, ViewEncapsulation } from '@angular/core';
import { MdIconRegistry } from '@angular/material';
import { BaseRestClient } from './shared/api/clients/base.rest-client';
import { StorageService } from './shared/services/storage.service';
import { AuthService } from './shared/services/auth.service';
import { UserService } from './shared/services/user.service';
import { SessionTransformer } from './shared/api/transformers/session.transformer';
import { UsersTransformer } from './shared/api/transformers/users.transformer';

import '../style/app.scss';

@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
    viewProviders: [MdIconRegistry],
    encapsulation: ViewEncapsulation.None,
    providers: [
        BaseRestClient,
        StorageService,
        AuthService,
        UserService,
        SessionTransformer,
        UsersTransformer
    ]
})
export class AppComponent {
    constructor (mdIconRegistry: MdIconRegistry) {
        mdIconRegistry
            .addSvgIcon('thumb-up', 'icons/thumbup-icon.svg')
            .addSvgIconSetInNamespace('core', 'icons/core-icon-set.svg')
            .addSvgIcon('people-black', 'icons/people-black-icon.svg')
            .addSvgIcon('lock-outline', 'icons/lock-outline-icon.svg')
            .addSvgIcon('more-vert', 'icons/more-vert-icon.svg')
            .registerFontClassAlias('fontawesome', 'fa');
    }
}
