import { Component,OnInit  } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
import { TopLevel } from 'src/app/interfaces'; // Importar la clase TopLevel desde index.ts
import {Comics} from '../../interfaces';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page implements OnInit {
  public comics: Comics[] = []; // Aquí debes cargar tus cómics desde tu API
  searchTerm: string = '';
  filteredComics: Comics[] = [];

  nombre?:     string;
  apodo?:     string;
  correo?:    string;
  tel?:       string;
  foto?:      string;

  constructor(private apiService: ApiService) {}
  ngOnInit() {
    this.loadComics();
  }

  loadComics() {
    this.apiService.getComics()
    .subscribe(resp => {
      console.log(resp); // Imprime el objeto TopLevel o arreglo TopLevel en la consola
      if (Array.isArray(resp)) {
        this.comics = resp; // Si es un arreglo, asigna directamente
      } else {
        this.comics = [resp]; // Si es un objeto, envuélvelo en un arreglo antes de asignar
      }
    });
  }

  filterComics() {
    this.filteredComics = this.comics.filter(comic => comic.titulo?.toLowerCase().includes(this.searchTerm.toLowerCase()));
  }


  enviarDatos() {
    const datos: TopLevel = { // Utilizar la clase TopLevel para definir la estructura de datos
      nombre: this.nombre,
      tel: this.tel,
      apodo: this.apodo,
      correo: this.correo,
      foto: this.foto
    };

    this.apiService.postDatos(datos).subscribe(resp => {
      console.log(resp);
      // Aquí puedes manejar la respuesta del servidor como desees
    });
  }
}
