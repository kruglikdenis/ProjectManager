import {ProjectTask} from './project-task';

export class Project {
    id: number;

    title: string;
    description: string;
    code: string;

    tasks: ProjectTask[] = [];

    constructor(resource) {
        this.id = resource.id || 0;
        this.title = resource.title || '';
        this.description = resource.description || '';
        this.code = resource.code || '';
        this.tasks = resource.tasks || [];
    }

    addTask(task: ProjectTask) {
        this.tasks.push(task);
    }
}
