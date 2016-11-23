import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';


@Component({
    selector: 'pm-project-modal',
    templateUrl: './project-modal.component.html',
    styleUrls: ['./project-modal.component.scss'],
})
export class ProjectModalComponent {
    id: string = 'projectModal';

    projectForm: FormGroup;

    constructor() {

    }
}
