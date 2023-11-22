import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ProfileComponent } from './components/profile/profile.component';
import { ProfileService } from './services/profile.service';
import { UserComponent } from './components/user/user.component';
import { PersonalDataComponent } from './components/personal-data/personal-data.component';
import { InterestsComponent } from './components/interests/interests.component';
import { SocialNetworksComponent } from './components/social-networks/social-networks.component';
import { FrameworksComponent } from './components/frameworks/frameworks.component';
import { CardComponent } from './components/card/card.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    ProfileComponent,
    UserComponent,
    PersonalDataComponent,
    InterestsComponent,
    SocialNetworksComponent,
    FrameworksComponent,
    CardComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [
    ProfileService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
