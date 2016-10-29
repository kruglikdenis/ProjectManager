import { Component, ViewChild, Input } from '@angular/core';
import { ModalComponent } from 'ng2-bs3-modal/ng2-bs3-modal';

@Component({
    selector: 'pm-user-edit',
    templateUrl: './edit.component.html',
    styleUrls: ['./edit.component.scss']
})
export class EditComponent {
    @Input() user;

    @ViewChild('modal')
    modal: ModalComponent;
    animation: boolean = true;
    keyboard: boolean = true;
    backdrop: string | boolean = true;
    css: boolean = false;

    constructor() {
    }

    open() {
        this.modal.open();
    }

    close() {
        this.modal.close();
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
}
