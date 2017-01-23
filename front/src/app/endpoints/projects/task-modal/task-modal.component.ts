import {Component, Input, OnInit} from '@angular/core';
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
export class TaskModalComponent extends ValueChanged implements OnInit{

    @Input() project:any;

    id: string = 'taskModal';

    taskForm: FormGroup;
    task: ProjectTask;

    constructor( private projectService: ProjectService ) {
        super();
        this.task = new ProjectTask({});
    }

    ngOnInit(): void {

    }


    save() {
        this.project.addTask(this.task);

        //
        // this.projectService.save(this.project)
        //     .then(() => console.log('Project save'));
    }
}
