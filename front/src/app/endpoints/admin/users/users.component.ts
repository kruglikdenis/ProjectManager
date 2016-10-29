import { Component} from '@angular/core';
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

    isLoading: boolean;
    search: string;

    constructor (private userService: UserService) {
        this.userService = userService;
        this.users = [];
        this.limit = 5;
        this.offset = 1;
        this.search = '';
        this.isLoading = false;

        this._loadUsers();
    }

    _loadUsers() {
        this.isLoading = true;
        this.userService
            .getUsers({name: this.search, limit: this.limit, offset: ((this.offset - 1) * this.limit)})
            .then(users => {
                this.users = users;
                this.isLoading = false;
            });
    }

    _prev() {
        if (this.offset >= 2) {
            this.offset--;
            this._loadUsers();
        }
    }

    _next() {
        this.offset++;
        this._loadUsers();
    }

    searchChange(searchValue) {
        this.search = searchValue;
        this._loadUsers();
    }

    isUsers() {
        return this.users.length !== 0;
    }

}
