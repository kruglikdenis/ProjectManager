import { RouterModule, Routes } from '@angular/router';

import { HomeRoutes } from './endpoints/home/home.routing';
import { ProjectsRoutes } from './endpoints/projects/projects.routing';

const routes: Routes = [
    ...HomeRoutes,
    ...ProjectsRoutes,
];

export const routing = RouterModule.forRoot(routes);
