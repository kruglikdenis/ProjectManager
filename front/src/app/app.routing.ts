import { RouterModule, Routes } from '@angular/router';

import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';

import { AdminComponent } from './components/admin/admin.component';
import { AdminUsersComponent } from './components/admin/users/users.component';
import { AdminProjectsComponent } from './components/admin/projects/projects.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'login', component: LoginComponent },

  { path: 'admin', component: AdminComponent },
  { path: 'admin/users', component: AdminUsersComponent },
  { path: 'admin/projects', component: AdminProjectsComponent }

];

export const routing = RouterModule.forRoot(routes);
