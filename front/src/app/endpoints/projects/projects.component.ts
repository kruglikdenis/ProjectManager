import { Component, OnInit } from '@angular/core';
import { Project } from '../../shared/models/project';
import { ProjectService } from '../../shared/services/project.service';
import { ModalService } from '../../shared/services/modal.service';

@Component({
    selector: 'pm-projects',
    templateUrl: './projects.component.html',
    styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit {
    isLoading: boolean;
    searchQuery: string;

    projects: Array<Project>;
    totalCountProjects: number;
    limit: number;
    page: number;

    constructor(
        private projectService: ProjectService,
        private modalService: ModalService
    ) {
        this.isLoading = false;

        this.searchQuery = '';
        this.totalCountProjects = 0;
        this.limit = 10;
        this.page = 1;
    }

    ngOnInit(): void {
        this.search();
    }

    changeSearchQuery(query) {
        this.searchQuery = query;

        this.search();
    }

    changePage(page) {
        this.page = page;
    }

    openModal() {
        this.modalService.open('projectModal');
    }

    search() {
        this.isLoading = true;

        this.projectService.search(this.searchQuery, this.limit, this.page)
            .then(({ projects, totalCount }) => {
                this.projects = projects;
                this.totalCountProjects = Number(totalCount);

                this.isLoading = false;
            })
        ;
    }
}
