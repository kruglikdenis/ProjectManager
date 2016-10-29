import { Component, Output, EventEmitter, Input } from '@angular/core';

@Component({
    selector: 'pm-pagination',
    templateUrl: './pagination.component.html',
    styleUrls: ['./pagination.component.scss']
})
export class PaginationComponent {
    @Output() onChangePage = new EventEmitter();

    private page:number;

    constructor() {
        this.page = 1;
    }

    next() {
        this.page += 1;

        this.onChangePage.emit(this.page);
    }

    prev() {
        this.page -= 1;

        this.onChangePage.emit(this.page);
    }
}
