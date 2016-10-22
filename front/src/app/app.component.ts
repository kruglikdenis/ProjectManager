import { Component } from '@angular/core';
import { MdIconRegistry } from '@angular/material';
import { BaseRestClient } from './shared/api/clients/base.rest-client';
import { StorageService } from './shared/services/storage.service';
import { AuthService } from './shared/services/auth.service';
import { SessionTransformer } from './shared/api/transformers/session.transformer';

import '../style/app.scss';

@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
    viewProviders: [MdIconRegistry],
    providers: [
        BaseRestClient,
        StorageService,
        AuthService,
        SessionTransformer
    ]
})
export class AppComponent {
    constructor (mdIconRegistry: MdIconRegistry) {
        mdIconRegistry
            .addSvgIcon('thumb-up', './../assets/icons/thumbup-icon.svg')
            .addSvgIconSetInNamespace('core', './../assets/icons/core-icon-set.svg')
            .registerFontClassAlias('fontawesome', 'fa');
    }
}
