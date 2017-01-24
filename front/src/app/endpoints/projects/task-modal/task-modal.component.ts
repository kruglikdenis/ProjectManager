import {Component, Input } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { ValueChanged } from '../../../shared/validation/core/ValueChanged';
import { ProjectService } from '../../../shared/services/project.service';
import { ProjectTask } from '../../../shared/models/project-task';
import { Project } from '../../../shared/models/project';

@Component({
    selector: 'pm-task-modal',
    templateUrl: './task-modal.component.html',
    styleUrls: ['./task-modal.component.scss'],
})
export class TaskModalComponent extends ValueChanged{

    @Input() project:Project;
    @Input() task: ProjectTask;

    id: string = 'taskModal';

    taskForm: FormGroup;

    constructor( private projectService: ProjectService ) {
        super();
        this.task = this.task || new ProjectTask({});
    }

    save() {
        this.task.project = this.project.id;

        this.projectService
            .saveTask(this.task);
    }
}
