import {ProjectTask} from './project-task';

export class Project {
    id: number;

    title: string;
    description: string;
    code: string;

    tasks: Array<ProjectTask> = [];

    constructor(resource) {
        this.id = resource.id || 0;
        this.title = resource.title || '';
        this.description = resource.description || '';
        this.code = resource.code || '';
        this.tasks = resource.tasks ? resource.tasks.map((item) => {return new ProjectTask(item)}) : [];
    }

    addTask(task: ProjectTask) {
        this.tasks.push(task);
    }
}
