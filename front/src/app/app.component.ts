import { Component } from '@angular/core';

import { ApiService } from './shared';

import '../style/app.scss';

@Component({
    selector: 'pm-app',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss'],
})
export class AppComponent {
    url: string = 'https://github.com/preboot/angular2-webpack';

    constructor(private api: ApiService) {

    }
}
