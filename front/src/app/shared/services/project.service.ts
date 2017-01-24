import { Injectable } from '@angular/core';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { ProjectListTransformer } from '../api/transformers/project-list.transformer';
import { Project } from '../models/project';
import { ProjectTask } from '../models/project-task';

@Injectable()
export class ProjectService {
    private PROJECT_URL: string = '/projects';
    private TASK_URL: string = '/tasks';

    constructor(
        private restClient: BaseRestClient,
        private listTransformer: ProjectListTransformer
    ) {}

    search(search, limit, page) {
        let params = { title: search, limit, offset: (page - 1) * limit };

        return this.restClient.get(this.PROJECT_URL, params, this.listTransformer)
            .then(({ data, headers }) => {
                return {
                    projects: data,
                    totalCount: headers.get('x-total-count')
                };
            });
    }

    save(project: Project) {
        return project.id ? this.restClient.patch(this.PROJECT_URL + '/' + project.id, project) : this.restClient.post(this.PROJECT_URL, project);
    }

    saveTask(task: ProjectTask) {
       return task.id ? this.restClient.patch(this.TASK_URL + '/' + task.id, task) : this.restClient.post(this.TASK_URL, task);
    }
}

