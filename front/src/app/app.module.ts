import { NgModule, ApplicationRef } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { NavbarComponent } from './components/navbar/navbar.component';

import { AdminComponent } from './components/admin/admin.component';
import { AdminUsersComponent } from './components/admin/users/users.component';
import { AdminProjectsComponent } from './components/admin/projects/projects.component';

import { BackComponent } from './components/back/back.component';

import { routing } from './app.routing';

import { MdCoreModule, OVERLAY_PROVIDERS } from '@angular2-material/core';
import { MdMenuModule } from '@angular2-material/menu';
import { MdIconModule, MdIconRegistry } from '@angular2-material/icon';
import { MdCardModule } from '@angular2-material/card';
import { MdInputModule } from '@angular2-material/input';
import { MdButtonModule } from '@angular2-material/button';
import { MdToolbarModule } from '@angular2-material/toolbar';

import { removeNgStyles, createNewHosts } from '@angularclass/hmr';

@NgModule({
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,

    MdMenuModule,
    MdCoreModule,
    MdIconModule,
    MdCardModule,
    MdInputModule,
    MdButtonModule,
    MdToolbarModule,

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
    BackComponent

  ],
  providers: [
      OVERLAY_PROVIDERS,
      MdIconRegistry
  ],
  bootstrap: [AppComponent]
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
