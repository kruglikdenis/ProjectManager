import { Component } from '@angular/core';
import { AuthService } from '../../shared/services/auth.service';

@Component({
    selector: 'pm-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.scss']
})
export class HomeComponent {
    isOpenAddBar: boolean;

    constructor(private authService: AuthService) {
        this.isOpenAddBar = false;
    }

    openAddBar() {
        this.isOpenAddBar = true;
    }

    get isAuthorized() {
        return this.authService.isAuthorized();
    }
}
