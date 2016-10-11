import { Component, OnInit } from '@angular/core';
import { StorageService } from '../../shared/services/storage.service';
import { AuthService } from '../../shared/services/auth.service';
import { User } from '../../shared/models/user';

@Component({
    selector: 'pm-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent implements OnInit {
    private user:User;

    constructor(private authService: AuthService) {

    }

    ngOnInit() {
        this.authService.authorizedEvent
            .subscribe(user => {this.user = user});
    }

    authorized(event) {
        console.log(event);
    }
}
