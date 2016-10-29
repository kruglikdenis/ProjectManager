import { Component, Output, EventEmitter, Input } from '@angular/core';

@Component({
    selector: 'pm-search',
    templateUrl: './search.component.html',
    styleUrls: ['./search.component.scss']
})
export class SearchComponent {
    @Input() isLoading: boolean;
    @Output() onChangeSearch = new EventEmitter();

    onKeyUp(value) {
        this.onChangeSearch.emit(value);
    }
}
