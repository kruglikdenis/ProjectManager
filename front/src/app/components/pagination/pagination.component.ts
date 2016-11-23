import { Component, Output, EventEmitter, Input, OnInit, OnChanges } from '@angular/core';

@Component({
    selector: 'pm-pagination',
    templateUrl: './pagination.component.html',
    styleUrls: ['./pagination.component.scss']
})
export class PaginationComponent implements OnInit, OnChanges {
    @Input() totalCount: number;
    @Input() limit: number;

    @Output() onChangePage = new EventEmitter();

    maxCountPages: number;
    halfCountPages: number;
    countPages: number;
    minPage: number;
    maxPage: number;
    selected: number;

    constructor() {
        this.selected = 1;
        this.maxCountPages = 5;
    }

    ngOnInit(): void {
        this.halfCountPages = Math.floor(this.maxCountPages / 2);
    }

    ngOnChanges(changes: any): void {
        let totalCount = (changes.totalCount) ? changes.totalCount.currentValue : this.totalCount;
        let limit = (changes.limit) ? changes.limit.currentValue : this.limit;

        this.countPages = Math.ceil(totalCount / limit);
    }

    get pages() {
        let pages = [];

        this.minPage = 1;
        if (this.selected - this.halfCountPages > 0) {
            this.minPage = this.selected - this.halfCountPages;
        }

        this.maxPage = this.countPages;
        if (this.selected + this.halfCountPages < this.countPages) {
            this.maxPage = this.minPage + this.maxCountPages - 1;
        }

        for (let counter = this.minPage; counter <= this.maxPage ; counter++) {
            pages.push(counter);
        }

        return pages;
    }

    next() {
        this.selected += 1;
        this.emit();
    }

    prev() {
        this.selected -= 1;
        this.emit();
    }

    select(selected) {
        this.selected = selected;
        this.emit();
    }

    emit() {
        this.onChangePage.emit(this.selected);
    }
}
