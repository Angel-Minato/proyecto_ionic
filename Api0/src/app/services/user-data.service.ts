// user-data.service.ts
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UserDataService {
  constructor() { }

  setUserData(nombre: string, correo: string, contrasena: string) {
    sessionStorage.setItem('nombre', nombre);
    sessionStorage.setItem('correo', correo);
    sessionStorage.setItem('contrasena', contrasena);
  }

  getId(): number {
    const idStr = sessionStorage.getItem('id');  
    const id = idStr ? parseInt(idStr, 10) : 0;
    return id;
  }

  getNombre(): string {
    return sessionStorage.getItem('nombre') || '';
  }

  getCorreo(): string {
    return sessionStorage.getItem('correo') || '';
  }

  getContrasena(): string {
    return sessionStorage.getItem('contrasena') || '';
  }

  clearUserData() {
    sessionStorage.removeItem('id');
    sessionStorage.removeItem('nombre');
    sessionStorage.removeItem('correo');
    sessionStorage.removeItem('contrasena');
  }

  printUserData() {
    const id = this.getId();
    const nombre = this.getNombre();
    const correo = this.getCorreo();
    const contrasena = this.getContrasena();
    console.log('ID del usuario:', id);
    console.log('Nombre del usuario:', nombre);
    console.log('Correo del usuario:', correo);
    console.log('Contraseña del usuario:', contrasena);
  }
}
