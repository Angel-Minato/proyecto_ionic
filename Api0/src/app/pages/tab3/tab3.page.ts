// tab3.page.ts
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { UserDataService } from '../../services/user-data.service'; 

@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})
export class Tab3Page {
  isLoggedIn: boolean = false;
  id: number = 0;
  nombre: string = "";
  correo: string = "";
  
  constructor(private userDataService: UserDataService,private router: Router) {
    
    this.isLoggedIn = !!this.userDataService.getCorreo();
    if (this.isLoggedIn) {
      this.id = this.userDataService.getId() || 0;
      this.nombre = this.userDataService.getNombre() || '';
      this.correo = this.userDataService.getCorreo() || '';
    } else {
      this.id = 0;
      this.nombre = '';
      this.correo = '';
    }
  }
  // Añade este método en tu componente Tab3Page
  navigateToLogin() {
    this.router.navigate(['/login']);
  }

}
