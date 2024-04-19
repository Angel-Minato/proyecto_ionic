import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
import {Comics} from '../../interfaces';
import { PopoverController } from '@ionic/angular';
import { VentanaModule } from '../../components/ventana/ventana.module';
import { VentanaComponent } from '../../components/ventana/ventana.component';


@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page implements OnInit {
  public resp: Comics[] = [];


  constructor(private apiService: ApiService, private popoverCtrl: PopoverController ) {}

  ngOnInit() {
    this.loadTopHeadlines();
  }
  loadTopHeadlines() {
    this.apiService.getComics()
    .subscribe(resp => {
      console.log(resp); // Imprime el objeto TopLevel o arreglo TopLevel en la consola
      if (Array.isArray(resp)) {
        this.resp = resp; // Si es un arreglo, asigna directamente
      } else {
        this.resp = [resp]; // Si es un objeto, envuélvelo en un arreglo antes de asignar
      }
    });

  }
  async verDetalles(event: any, comic: any) {
    const popover = await this.popoverCtrl.create({
      component: VentanaComponent, // Aquí debes usar el componente, no el módulo
      componentProps: { comic: comic },
      event: event
    });
  
    return await popover.present();
  }
 
}
