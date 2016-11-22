import { Component, OnInit } from '@angular/core';
import { Project } from '../../shared/models/project';
import { ProjectService } from '../../shared/services/project.service';

@Component({
    selector: 'pm-projects',
    templateUrl: './projects.component.html',
    styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit {
    isLoading: boolean;
    searchQuery: string;
    projects: Array<Project>;

    constructor(private projectService: ProjectService) {
        this.searchQuery = '';
        this.isLoading = false;
    }

    ngOnInit(): void {
        this.search();
    }

    changeSearchQuery(query) {
        this.searchQuery = query;

        this.search();
    }

    search() {
        this.isLoading = true;

        this.projectService.search(this.searchQuery)
            .then(({ data }) => {
                this.projects = data;
                this.isLoading = false;
            })
        ;
    }
}
