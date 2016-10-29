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
    search: string;
    page: number;
    totalUsers: number;

    isLoading: boolean;

    constructor (private userService: UserService) {
        this.userService = userService;
        this.users = [];
        this.limit = 5;
        this.page = 1;
        this.search = '';
        this.isLoading = false;

        this.loadUsers();
    }

    loadUsers() {
        let offset = (this.page - 1) * this.limit;

        this.isLoading = true;
        this.userService.search(this.search, this.limit, offset)
            .then(users => {
                this.users = users;
                this.isLoading = false;
            })
        ;
    }

    setPage(page) {
        this.page = page;

        this.loadUsers();
    }

    setSearch(search) {
        this.search = search;

        this.loadUsers();
    }

    isUsers() {
        return this.users.length !== 0;
    }
}
