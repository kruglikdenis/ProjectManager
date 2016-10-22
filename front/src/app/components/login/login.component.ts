import { Component } from '@angular/core';
import { User } from '../../shared/models/user';
import { AuthService } from '../../shared/services/auth.service';
import { Router } from '@angular/router';

@Component({
    selector: 'pm-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent {
    user: User;

    constructor(
        private authService: AuthService,
        private router: Router
    ) {
        this.user = new User();
    }

    login() {
        this.authService.login(this.user)
            .then(session => {
                this.router.navigate(['/']);
            });
    }
}
