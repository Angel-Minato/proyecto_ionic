import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular'; // Importa IonicModule aquí
import { VentanaComponent } from './ventana.component';

@NgModule({
  declarations: [VentanaComponent],
  imports: [
    CommonModule,
    IonicModule // Añade IonicModule a la lista de imports
  ],
  exports: [VentanaComponent]
})
export class VentanaModule { }

