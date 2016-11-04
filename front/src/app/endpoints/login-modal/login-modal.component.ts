import { Component } from '@angular/core';
import { AuthUser } from '../../shared/models/auth-user';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';

@Component({
    selector: 'pm-login-modal',
    templateUrl: './login-modal.component.html',
    styleUrls: ['./login-modal.component.scss']
})
export class LoginModalComponent {
    id: string = 'loginModal'

    user: AuthUser;
    isAccessDenied: boolean;
    isLoading: boolean;

    constructor(
        private authService: AuthService,
        private modalService: ModalService,
        private router: Router
    ) {
        this.user = new AuthUser();
        this.isAccessDenied = false;
        this.isLoading = false;
    }

    login() {
        this.isAccessDenied = false;
        this.isLoading = true;

        this.authService.login(this.user)
            .then(() => {
                this.isLoading = false;
                this.modalService.close(this.id);
            })
            .catch(error => {
                this.isLoading = false;
                this.isAccessDenied = true
            })
        ;
    }
}
