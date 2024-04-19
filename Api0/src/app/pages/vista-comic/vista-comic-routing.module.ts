import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { VistaComicPage } from './vista-comic.page';

const routes: Routes = [
  {
    path: '',
    component: VistaComicPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class VistaComicPageRoutingModule {}
