import { RouterModule, Routes } from '@angular/router';

import { AdminRoutes } from './components/admin/admin.routing';
import { HomeRoutes } from './components/home/home.routing';
import { LoginRoutes } from './components/login/login.routing';

const routes: Routes = [
    ...LoginRoutes,
    ...HomeRoutes,
    ...AdminRoutes,
];

export const routing = RouterModule.forRoot(routes);
