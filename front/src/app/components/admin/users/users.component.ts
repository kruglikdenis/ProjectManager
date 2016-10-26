import { Component, EventEmmiter } from '@angular/core';
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

    search: string;

    constructor ( private userService: UserService ) {
        this.userService = userService;

        this.limit = 5;
        this.offset = 1;
        this.search = '';

        this._loadUsers();
    }

    _loadUsers() {
        this.userService
            .getUsers({name: this.search, limit: this.limit, offset: ((this.offset - 1) * this.limit)})
            .then(users => {
                console.log(users);
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

    searchChange(searchValue) {
        this.search = searchValue;
        this._loadUsers();
    }


}
