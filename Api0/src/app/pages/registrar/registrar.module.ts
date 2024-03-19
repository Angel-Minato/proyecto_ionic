import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RegistrarPageRoutingModule } from './registrar-routing.module';

import { RegistrarPage } from './registrar.page';
import { EjemploComponent } from '../../components/ejemplo/ejemplo.component';



@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RegistrarPageRoutingModule
  ],
  declarations: [RegistrarPage]
})
export class RegistrarPageModule {}
