import { Component, Output, EventEmitter, Input } from '@angular/core';

@Component({
    selector: 'pm-search',
    templateUrl: './search.component.html',
    styleUrls: ['./search.component.scss']
})
export class SearchComponent {
    @Input() isLoading: boolean;
    @Output() search = new EventEmitter();

    onKeyUp(value) {
        this.search.emit(value);
    }
}
