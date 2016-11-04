import { NgModule, ApplicationRef } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpModule } from '@angular/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MaterialModule } from '@angular/material';

import { AppComponent } from './app.component';
import { HomeComponent } from './endpoints/home/home.component';
import { LoginModalComponent } from './endpoints/login-modal/login-modal.component';
import { NavbarComponent } from './endpoints/navbar/navbar.component';
import { SearchComponent } from './components/search/search.component';
import { UserCardComponent } from './components/user-card/user-card.component';
import { PaginationComponent } from './components/pagination/pagination.component';
import { ModalComponent } from './components/modal/modal.component';
import { ModalHeaderComponent } from './components/modal/components/modal-header/modal-header.component';
import { ModalBodyComponent } from './components/modal/components/modal-body/modal-body.component';
import { ModalFooterComponent } from './components/modal/components/modal-footer/modal-footer.component';
import { SpinnerComponent } from './components/spinner/spinner.component';

import { AdminComponent } from './endpoints/admin/admin.component';
import { AdminUsersComponent } from './endpoints/admin/users/users.component';
import { AdminProjectsComponent } from './endpoints/admin/projects/projects.component';

import { routing } from './app.routing';
import { OVERLAY_PROVIDERS } from '@angular/material';

import { removeNgStyles, createNewHosts } from '@angularclass/hmr';

@NgModule({
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,
    ReactiveFormsModule,
    MaterialModule.forRoot(),

    routing
  ],
  declarations: [
    AppComponent,
    LoginModalComponent,
    NavbarComponent,
    HomeComponent,
    AdminComponent,
    AdminUsersComponent,
    AdminProjectsComponent,
    SearchComponent,
    UserCardComponent,
    PaginationComponent,
    ModalComponent,
    ModalHeaderComponent,
    ModalBodyComponent,
    ModalFooterComponent,
    SpinnerComponent
  ],
  providers: [
      OVERLAY_PROVIDERS
  ],
  bootstrap: [AppComponent],
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
