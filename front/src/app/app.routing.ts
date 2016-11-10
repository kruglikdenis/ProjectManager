import { RouterModule, Routes } from '@angular/router';

import { AdminRoutes } from './endpoints/admin/admin.routing';
import { HomeRoutes } from './endpoints/home/home.routing';
import { ProjectsRoutes } from './endpoints/projects/projects.routing';

const routes: Routes = [
    ...HomeRoutes,
    ...AdminRoutes,
    ...ProjectsRoutes,
];

export const routing = RouterModule.forRoot(routes);
