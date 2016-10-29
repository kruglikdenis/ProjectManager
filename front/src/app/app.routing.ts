import { RouterModule, Routes } from '@angular/router';

import { AdminRoutes } from './endpoints/admin/admin.routing';
import { HomeRoutes } from './endpoints/home/home.routing';
import { LoginRoutes } from './endpoints/login/login.routing';

const routes: Routes = [
    ...LoginRoutes,
    ...HomeRoutes,
    ...AdminRoutes,
];

export const routing = RouterModule.forRoot(routes);
