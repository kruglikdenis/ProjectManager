import { Component } from '@angular/core';
import { UserService } from '../../../shared/services/user.service';

@Component({
    selector: 'pm-users',
    templateUrl: './users.component.html',
    styleUrls: ['./users.component.scss']
})
export class AdminUsersComponent {

    users: Array<any>;

    limit: number;
    offset: number;
    totalUsers: number;

    filterName: string;

    constructor ( private userService: UserService ) {
        this.userService = userService;

        this.limit = 10;
        this.offset = 1;
        this.name = '';

        this._loadUsers();
    }

    _loadUsers() {
        this.userService
            .getUsers({name: this.name, limit: this.limit, offset: ((this.offset - 1) * this.limit)})
            .then(users => {
                this.users = users;
            })
            .catch(error => this.isAccessDenied = true)
        ;
    }

    _prev() {
        if(this.offset >= 2){
            this.offset--;
            this._loadUsers();
        }
    }

    _next() {
        //TODO: получить totalUsers
        this.offset++;
        this._loadUsers();
    }


}
