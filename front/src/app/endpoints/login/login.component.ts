import { Component } from '@angular/core';
import { AuthUser } from '../../shared/models/auth-user';
import { AuthService } from '../../shared/services/auth.service';
import { Router } from '@angular/router';

@Component({
    selector: 'pm-login-modal',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent {
    user: AuthUser;
    isAccessDenied: boolean;

    constructor(
        private authService: AuthService,
        private router: Router
    ) {
        this.user = new AuthUser();
    }

    login() {
        this.isAccessDenied = false;

        this.authService.login(this.user)
            .then(() => $('#loginModal').modal('hide'))
            .catch(error => this.isAccessDenied = true)
        ;
    }
}
