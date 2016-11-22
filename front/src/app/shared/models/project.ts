export class Project {
    id: number;

    title: string;
    description: string;
    code: string;

    constructor(resource) {
        this.id = resource.id || 0;
        this.title = resource.title || '';
        this.description = resource.description || '';
        this.code = resource.code || '';
    }
}
