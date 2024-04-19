import { Component, OnInit, Input } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-ventana',
  templateUrl: './ventana.component.html',
  styleUrls: ['./ventana.component.scss'],
})
export class VentanaComponent  implements OnInit {
  @Input() comic: any;
  constructor(private navCtrl: NavController) { }

  ngOnInit() {}

  verPagina() {
    this.navCtrl.navigateForward(`/vista-comic/${this.comic.comic_id}`);
  }

}
