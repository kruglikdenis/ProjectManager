import { Component, OnInit } from '@angular/core';
import { Project } from '../../shared/models/project';
import { ProjectTask } from '../../shared/models/project-task';
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
    projectModal: string;
    taskModal: string;
    activeProject: any;
    activeTask: any;

    constructor(
        private projectService: ProjectService,
        private modalService: ModalService
    ) {
        this.isLoading = false;

        this.searchQuery = '';
        this.totalCountProjects = 0;
        this.limit = 3;
        this.page = 1;

        this.projectModal = 'projectModal';
        this.taskModal = 'taskModal';
        this.activeProject = {};
        this.activeTask = {};

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
        this.search(false);
    }

    openModal(id: string) {
        this.modalService.open(id);
    }

    search(isLoading = true) {
        this.isLoading = isLoading;

        this.projectService.search(this.searchQuery, this.limit, this.page)
            .then(({ projects, totalCount }) => {
                this.projects = projects;
                this.totalCountProjects = Number(totalCount);

                this.isLoading = false;
            })
        ;
    }

    preModal(idModal: string, project: Project, task: ProjectTask) {
        this.activeProject = project ? project : new Project({});
        this.activeTask = task ? task : new ProjectTask({});
        this.openModal(idModal);
    }
}
