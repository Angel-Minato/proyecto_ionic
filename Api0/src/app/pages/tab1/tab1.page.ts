import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
//import { TopLevel } from '../../interfaces';
import { TopLevel } from '../../interfaces';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page implements OnInit {
  public resp: TopLevel[] = [];


  constructor(private apiService: ApiService ) {}

  ngOnInit() {
    this.loadTopHeadlines();
  }
  loadTopHeadlines() {
    this.apiService.getTopHeadlines()
    .subscribe(resp => {
      console.log(resp); // Imprime el objeto TopLevel o arreglo TopLevel en la consola
      if (Array.isArray(resp)) {
        this.resp = resp; // Si es un arreglo, asigna directamente
      } else {
        this.resp = [resp]; // Si es un objeto, envuélvelo en un arreglo antes de asignar
      }
    });
    /*.subscribe(
      (resp ) => {
        console.log(resp);
        resp = resp;
      },
      (error) => {
        console.error('Error fetching top headlines:', error);
      }
    );
    */
  }

/*
  ngOnInit() {
    this.newService.getTopHeadlines()
      .subscribe(resp => {
        console.log(resp); // Imprime el objeto TopLevel o arreglo TopLevel en la consola
        if (Array.isArray(resp)) {
          this.resp = resp; // Si es un arreglo, asigna directamente
        } else {
          this.resp = [resp]; // Si es un objeto, envuélvelo en un arreglo antes de asignar
        }
      });
  }
*/

  deleteItem(id_maestro: number) {
    this.apiService.deleteDato(id_maestro).subscribe(
      (response: any) => {
        console.log(response);
        this.resp = this.resp.filter(item => item.id_maestro !== id_maestro);
      },
      error => {
        console.error("Error al eliminar el registro:", error);
      }
    );
    }
}
