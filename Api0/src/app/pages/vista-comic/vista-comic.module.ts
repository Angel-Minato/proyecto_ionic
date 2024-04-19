import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { VistaComicPageRoutingModule } from './vista-comic-routing.module';

import { VistaComicPage } from './vista-comic.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    VistaComicPageRoutingModule
  ],
  declarations: [VistaComicPage]
})
export class VistaComicPageModule {}
