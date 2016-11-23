import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ValueChanged } from '../../../shared/validation/core/ValueChanged';
import { ProjectService } from "../../../shared/services/project.service";
import { Project } from "../../../shared/models/project";

@Component({
    selector: 'pm-project-modal',
    templateUrl: './project-modal.component.html',
    styleUrls: ['./project-modal.component.scss'],
})
export class ProjectModalComponent extends ValueChanged implements OnInit {
    id: string = 'projectModal';

    projectForm: FormGroup;
    project: Project;

    constructor( private projectService: ProjectService ) {
        super();
        this.project = new Project({});
    }

    save() {
        this.projectService.save(this.project)
            .then(() => this.project = new Project({}));
    }
}
