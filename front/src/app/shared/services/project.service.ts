import { Injectable } from '@angular/core';
import { BaseRestClient } from '../api/clients/base.rest-client';
import { ProjectListTransformer } from '../api/transformers/project-list.transformer';

@Injectable()
export class ProjectService {
    private PROJECT_URL: string = '/projects';

    constructor(
        private restClient: BaseRestClient,
        private listTransformer: ProjectListTransformer
    ) {}

    search(search) {
        let params = { title: search };

        return this.restClient.get(this.PROJECT_URL, params, this.listTransformer);
    }
}

