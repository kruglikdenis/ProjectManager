import { Component, Input } from '@angular/core';

@Component({
    selector: 'pm-modal',
    templateUrl: './modal.component.html',
    styleUrls: ['./modal.component.scss']
})
export class ModalComponent {
    @Input() identifier: string;
}
