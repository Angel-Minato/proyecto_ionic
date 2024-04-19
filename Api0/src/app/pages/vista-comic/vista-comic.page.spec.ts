import { ComponentFixture, TestBed } from '@angular/core/testing';
import { VistaComicPage } from './vista-comic.page';

describe('VistaComicPage', () => {
  let component: VistaComicPage;
  let fixture: ComponentFixture<VistaComicPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(VistaComicPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
