import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginComponent } from './login.component';

@NgModule({
  declarations: [
    LoginComponent // Declarar LoginComponent aquí
  ],
  imports: [CommonModule],
  exports: [LoginComponent] 
})
export class LoginComponentes { }

