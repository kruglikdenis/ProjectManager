import { RouterModule, Routes } from '@angular/router';

import { AdminRoutes } from './endpoints/admin/admin.routing';
import { HomeRoutes } from './endpoints/home/home.routing';

const routes: Routes = [
    ...HomeRoutes,
    ...AdminRoutes
];

export const routing = RouterModule.forRoot(routes);
