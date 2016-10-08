import { Component, OnInit } from '@angular/core';
import { User } from '../../shared/models/user';
import { AuthService } from '../../shared/services/auth.service'

@Component({
    selector: 'pm-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
    providers: [AuthService]
})
export class LoginComponent implements OnInit {
    user: User;

    constructor(private authService: AuthService) {}

    login() {
        this.authService.login(this.user);
    }

    ngOnInit() {
        this.user = new User();
    }
}
