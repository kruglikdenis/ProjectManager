import { Component, ViewEncapsulation } from '@angular/core';
import { MdIconRegistry } from '@angular/material';

@Component({
    selector: 'pm-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss'],
    viewProviders: [MdIconRegistry],
    encapsulation: ViewEncapsulation.None,
})
export class NavbarComponent {
    constructor(mdIconRegistry: MdIconRegistry) {
        mdIconRegistry
            .addSvgIcon('thumb-up', '../../../assets/icons/thumbup-icon.svg')
            .addSvgIconSetInNamespace('core', '../../../assets/icons/core-icon-set.svg')
            .registerFontClassAlias('fontawesome', 'fa');
    }
}
