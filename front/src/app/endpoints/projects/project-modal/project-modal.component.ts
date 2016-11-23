import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ValueChanged } from '../../../shared/validation/core/ValueChanged';


@Component({
    selector: 'pm-project-modal',
    templateUrl: './project-modal.component.html',
    styleUrls: ['./project-modal.component.scss'],
})
export class ProjectModalComponent extends ValueChanged implements OnInit {
    id: string = 'projectModal';

    projectForm: FormGroup;

    constructor() {
        super();
    }
}
