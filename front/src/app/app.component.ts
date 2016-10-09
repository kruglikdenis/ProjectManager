import { Component } from '@angular/core';
import { MdIconRegistry } from '@angular/material';
import { BaseRestClient } from './shared/api/clients/base.rest-client';
import { StorageService } from './shared/services/storage.service';

import '../style/app.scss';

@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
    viewProviders: [MdIconRegistry],
    providers: [BaseRestClient, StorageService]
})
export class AppComponent {
    constructor (mdIconRegistry: MdIconRegistry) {
        mdIconRegistry
            .addSvgIcon('thumb-up', './../assets/icons/thumbup-icon.svg')
            .addSvgIconSetInNamespace('core', './../assets/icons/core-icon-set.svg')
            .registerFontClassAlias('fontawesome', 'fa');
    }
}
