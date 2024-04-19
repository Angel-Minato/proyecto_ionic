// registrar.page.ts
import { Component, OnInit } from '@angular/core';
import { NavController } from '@ionic/angular';
import { Auth, createUserWithEmailAndPassword } from '@angular/fire/auth';
import { Yuser } from '../../interfaces/index';
import { ApiService } from 'src/app/services/api.service';
import { UserDataService } from 'src/app/services/user-data.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-registrar',
  templateUrl: './registrar.page.html',
  styleUrls: ['./registrar.page.scss'],
})
export class RegistrarPage {
  name: string = '';
  email: string = '';
  password: string = '';

  constructor(
    public router: Router,
    public navCntrl: NavController,
    private auth: Auth,
    private apiService: ApiService,
    private userDataService: UserDataService
  ) {}

  async signup() {
    try {
      const userCredential = await createUserWithEmailAndPassword(
        this.auth,
        this.email,
        this.password
      );

      // Guardar datos del usuario en tu base de datos
      const user: Yuser = {
        id: Number(userCredential.user.uid),
        nombre: this.name,
        correo: this.email,
        contrasena: this.password,
      };

      // Con esto guardo al usuario
      if (user.nombre && user.correo && user.contrasena) {
        this.userDataService.setUserData(user.nombre, user.correo, user.contrasena);
      } else {
        console.error('Faltan datos del usuario');
        return;
      }

      // Aqui nomas imprimo los datos y el token
      this.userDataService.printUserData();

      // Guardar datos del usuario en la base de datos
      this.apiService.saveUserData(user).subscribe((response: any) => {
        console.log('Usuario guardado en la base de datos:', response);
      });

      this.router.navigate(['/tabs']);

      return userCredential;
    } catch (error) {
      console.error('Error al registrar usuario:', error);
      throw error;
    }
  }

  gotoLogin() {
    this.navCntrl.navigateBack('login');
  }

  navigateToLogin() {
    this.router.navigate(['/login']); 
  }

  back(){
    this.router.navigate(['/tabs/tab1'])
  }
  
}
