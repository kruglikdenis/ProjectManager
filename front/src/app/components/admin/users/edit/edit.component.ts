import { Component } from '@angular/core';

@Component({
    selector: 'pm-user-edit',
    templateUrl: './edit.component.html',
    styleUrls: ['./edit.component.scss']
})
export class EditComponent {
    constructor() {
    }

    open(user) {
        console.log(user);
    }
}
