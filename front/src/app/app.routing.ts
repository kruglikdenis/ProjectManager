import { RouterModule, Routes } from '@angular/router';

import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';

const routes: Routes = [
  { path: '', component: HomeComponent }
  { path: 'login', component: LoginComponent }
];

export const routing = RouterModule.forRoot(routes);
