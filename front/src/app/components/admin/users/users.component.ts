import { Component, ViewChild } from '@angular/core';
import { UserService } from '../../../shared/services/user.service';
import { ModalComponent } from 'ng2-bs3-modal/ng2-bs3-modal';

@Component({
    selector: 'pm-users',
    templateUrl: './users.component.html',
    styleUrls: ['./users.component.scss']
})
export class AdminUsersComponent {

    @ViewChild('modal')
    modal: ModalComponent;
    animation: boolean = true;
    keyboard: boolean = true;
    backdrop: string | boolean = true;
    css: boolean = false;

    users: Array<any>;

    limit: number;
    offset: number;
    totalUsers: number;
    searchTitle: string;

    isLoad: boolean;
    search: string;

    constructor ( private userService: UserService) {
        this.userService = userService;
        this.users = [];
        this.limit = 5;
        this.offset = 1;
        this.search = '';
        this.isLoad = false;

        this.searchTitle = 'Search by name OR email';

        this._loadUsers();
    }

    open() {
        this.modal.open();
    }

    closed() {
        this.output = '(closed) ' + this.selected;
    }

    dismissed() {
        this.output = '(dismissed)';
    }

    opened() {
        this.output = '(opened)';
    }

    _loadUsers() {
        this.userService
            .getUsers({name: this.search, limit: this.limit, offset: ((this.offset - 1) * this.limit)})
            .then(users => {
                this.users = users;
                this.searchTitle = 'Search by name OR email';
                this.isLoad = true;
            });
    }

    _prev() {
        if (this.offset >= 2) {
            this.offset--;
            this._loadUsers();
        }
    }

    _next() {
        // TODO: �������� totalUsers
        this.offset++;
        this._loadUsers();
    }

    searchChange(searchValue) {
        this.searchTitle = 'Search...';
        this.search = searchValue;
        this._loadUsers();
    }

    isUsers() {
        return this.users.length !== 0;
    }

}
