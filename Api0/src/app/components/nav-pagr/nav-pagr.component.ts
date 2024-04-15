import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserDataService } from '../../services/user-data.service'; 
import { Auth, signOut } from '@angular/fire/auth'; 


@Component({
  selector: 'app-nav-pagr',
  templateUrl: './nav-pagr.component.html',
  styleUrls: ['./nav-pagr.component.scss'],
})
export class NavPagrComponent implements OnInit { 
  correo: string = "";
  
  constructor(
    private router: Router,
    private auth: Auth,
    private userDataService: UserDataService
  ) {}

  ngOnInit() {
    this.correo = this.userDataService.getCorreo();
  }

  printUserData() {
    this.userDataService.printUserData();
  }

  async logout() {
    try {
      await signOut(this.auth);
      this.userDataService.clearUserData(); 
      this.router.navigate(['/login']);
    } catch (error) {
      console.error("Error al cerrar sesión:", error);
    }
  }
}
