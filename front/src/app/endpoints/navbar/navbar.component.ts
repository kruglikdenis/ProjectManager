import { Component } from '@angular/core';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';

@Component({
    selector: 'pm-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent {
    constructor(
        private authService: AuthService,
        private modalService: ModalService
    ) {}

    openLoginModal() {
        this.modalService.open('loginModal');
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
