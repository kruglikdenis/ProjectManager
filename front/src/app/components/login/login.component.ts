import { Component } from '@angular/core';
import { User } from '../../shared/models/user';
import { AuthService } from '../../shared/services/auth.service'

@Component({
    selector: 'pm-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
    providers: [AuthService]
})
export class LoginComponent {
    user: User;

    constructor(private authService: AuthService) {
        this.user = new User();
    }

    login() {
        this.authService.login(this.user);
    }
}
