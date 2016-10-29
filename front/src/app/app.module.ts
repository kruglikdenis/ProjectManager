import { NgModule, ApplicationRef } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';
import { MaterialModule } from '@angular/material';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { NavbarComponent } from './components/navbar/navbar.component';

import { AdminComponent } from './components/admin/admin.component';
import { AdminUsersComponent } from './components/admin/users/users.component';
import { AdminProjectsComponent } from './components/admin/projects/projects.component';
import { BackComponent } from './components/back/back.component';
import { EditComponent as UserEditComponent } from './components/admin/users/edit/edit.component';
import { Ng2Bs3ModalModule } from 'ng2-bs3-modal/ng2-bs3-modal';

import { routing } from './app.routing';
import { MdIconRegistry } from '@angular/material';
import { OVERLAY_PROVIDERS } from '@angular/material';

import { removeNgStyles, createNewHosts } from '@angularclass/hmr';

@NgModule({
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,
    MaterialModule.forRoot(),
    Ng2Bs3ModalModule,

    routing
  ],
  declarations: [
    AppComponent,
    LoginComponent,
    NavbarComponent,
    HomeComponent,
    AdminComponent,
    AdminUsersComponent,
    AdminProjectsComponent,
    BackComponent,
    UserEditComponent

  ],
  providers: [
      OVERLAY_PROVIDERS,
      MdIconRegistry
  ],
  bootstrap: [AppComponent],
  entryComponents: [UserEditComponent]

})
export class AppModule {
  constructor(public appRef: ApplicationRef) {}
  hmrOnInit(store) {
    console.log('HMR store', store);
  }
  hmrOnDestroy(store) {
    let cmpLocation = this.appRef.components.map(cmp => cmp.location.nativeElement);
    // recreate elements
    store.disposeOldHosts = createNewHosts(cmpLocation);
    // remove styles
    removeNgStyles();
  }
  hmrAfterDestroy(store) {
    // display new elements
    store.disposeOldHosts();
    delete store.disposeOldHosts;
  }
}
