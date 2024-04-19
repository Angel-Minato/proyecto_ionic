// vista-comic.page.ts
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Comics } from '../../interfaces';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-vista-comic',
  templateUrl: './vista-comic.page.html',
  styleUrls: ['./vista-comic.page.scss'],
})
export class VistaComicPage implements OnInit {
  id: number | null = null; // Declara id como una propiedad de la clase
  comic: Comics = {}; // Inicializa comic como una propiedad de la clase

  constructor(private route: ActivatedRoute, private apiService: ApiService) { }

  ngOnInit() {
    const idParam = this.route.snapshot.paramMap.get('id');
    this.id = idParam ? Number(idParam) : null;
  
    if (this.id !== null) {
      this.apiService.getComicDetails(Number(this.id))
      .subscribe(resp => {
        console.log(resp);
        this.comic = resp;
      });
    }
  }
  
}
