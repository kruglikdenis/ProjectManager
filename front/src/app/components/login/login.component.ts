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
    isAccessDenied: boolean;

    constructor(
        private authService: AuthService,
        private router: Router
    ) {
        this.user = new User();
    }

    login() {
        this.isAccessDenied = false;
        
        this.authService.login(this.user)
            .then(session => 
            {
                if(session.user.roles == 'ROLE_ADMIN') {
                    this.router.navigate(['admin']);
                } else {
                    this.router.navigate(['/']);
                }
            })
            .catch(error => this.isAccessDenied = true)
        ;
    }
}
