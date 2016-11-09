import { Route } from '@angular/router';

import { AdminComponent } from './admin.component';
import { AdminUsersComponent } from './users/users.component';
import { AdminProjectsComponent } from './projects/projects.component';

//noinspection TypeScriptValidateTypes
export const AdminRoutes: Route[] = [
    {
        path: 'admin',
        component: AdminComponent,
        children: [
            { path: '' },
            { path: 'users', component: AdminUsersComponent },
            { path: 'projects', component: AdminProjectsComponent }
        ]
    }
];
