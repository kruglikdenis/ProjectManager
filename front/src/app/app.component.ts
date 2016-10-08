import { Component } from '@angular/core';
import { MdIconRegistry } from '@angular/material';

import '../style/app.scss';

@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
    viewProviders: [MdIconRegistry]
})
export class AppComponent {
    constructor (mdIconRegistry: MdIconRegistry) {
        mdIconRegistry
            .addSvgIcon('thumb-up', './../assets/icons/thumbup-icon.svg')
            .addSvgIconSetInNamespace('core', './../assets/icons/core-icon-set.svg')
            .registerFontClassAlias('fontawesome', 'fa');
    }
}
