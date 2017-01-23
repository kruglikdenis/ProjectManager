import {ProjectTask} from './project-task';
export class Project {
    id: number;

    title: string;
    description: string;
    code: string;

    tasks: Array<ProjectTask>;

    constructor(resource) {
        this.id = resource.id || 0;
        this.title = resource.title || '';
        this.description = resource.description || '';
        this.code = resource.code || '';
    }

    getFixTasks () {
        return [
            new ProjectTask({
                id: 0,
                title: this.title + ' task',
                description: this.description + ' task',
                code: this.code,
                estimate: 0,
                created: '2017/01/23 16:22:10',
                closed: '',
                resolution: false,
            }),
            new ProjectTask({
                id: 1,
                title: this.title + ' task',
                description: this.description + ' task',
                code: this.code,
                estimate: 10,
                created: '2017/01/23 12:25:10',
                closed: '',
                resolution: false,
            }),
            new ProjectTask({
                id: 2,
                title: this.title + ' task',
                description: this.description + ' task',
                code: this.code,
                estimate: 20,
                created: '2017/01/23 10:00:10',
                closed: '',
                resolution: false,
            })
        ];
    }
}
