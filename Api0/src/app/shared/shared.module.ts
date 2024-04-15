import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EjemploComponent } from '../components/ejemplo/ejemplo.component';
import { NavPagrComponent } from '../components/nav-pagr/nav-pagr.component';

import { IonicModule } from '@ionic/angular';
import { FormsModule } from '@angular/forms';


@NgModule({
  declarations: [
    EjemploComponent,
    NavPagrComponent
  ],
  imports: [
    CommonModule,
    IonicModule,
    FormsModule
  ],
  exports: [
    EjemploComponent,
    NavPagrComponent
  ]
})
export class SharedModule { }
