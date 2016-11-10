import { Route } from '@angular/router';

import { AdminComponent } from './admin.component';
import { AdminUsersComponent } from './users/users.component';
import { AdminProjectsComponent } from './projects/projects.component';

export const AdminRoutes: Route[] = [
    <Route>{
        path: 'admin',
        component: AdminComponent,
        children: [
            { path: '' },
            { path: 'users', component: AdminUsersComponent },
            { path: 'projects', component: AdminProjectsComponent }
        ]
    }
];
