import { Project } from './project';

export class ProjectTask {
    id: number;

    title: string;
    description: string;
    code: string; //project code

    // executor: User();
    estimate: string;
    created: string;
    closed: string;

    resolution: boolean;

    project: number;

    constructor(resource) {
        this.id = resource.id || 0;
        this.title = resource.title || '';
        this.description = resource.description || '';
        this.code = resource.code || '';
        this.estimate = resource.estimate || '';
        this.created = resource.created || '';
        this.closed = resource.closed || '';
        this.resolution = resource.resolution || false;
    }

}
