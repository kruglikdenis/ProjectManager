import { Component } from '@angular/core';
import { AuthService } from '../../shared/services/auth.service';

@Component({
    selector: 'pm-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent {
    constructor(private authService: AuthService) {}

    openLoginModal() {
        $('#loginModal').modal('show');
    }

    logout() {
        this.authService.logout();
    }

    get isAdmin() {
        return this.authService.isAdmin();
    }

    get isAuthorized() {
        return this.authService.isAuthorized();
    }
}
