import { Component, Input } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { ValueChanged } from '../../../shared/validation/core/ValueChanged';
import { ProjectService } from '../../../shared/services/project.service';
import { Project } from '../../../shared/models/project';

@Component({
    selector: 'pm-project-modal',
    templateUrl: './project-modal.component.html',
    styleUrls: ['./project-modal.component.scss'],
})
export class ProjectModalComponent extends ValueChanged {
    id: string = 'projectModal';

    @Input() project:Project = new Project({});

    projectForm: FormGroup;
    // project: Project;

    constructor( private projectService: ProjectService ) {
        super();
        // this.project = this.project || new Project({});
    }

    save() {
        this.projectService.save(this.project)
            .then(() => {
                    if (!this.project.id) {
                        this.project = new Project({})
                    }
                }
            );
    }
}
