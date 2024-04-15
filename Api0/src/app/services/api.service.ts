import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, pipe } from 'rxjs';
import { TopLevel } from '../interfaces';
import {Comics} from '../interfaces';
import {Yuser} from '../interfaces';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class ApiService {
  public apiUrl = 'http://127.0.0.1:80/api1/routes/maestros.php'; // Reemplaza con la URL de tu API
  public apiComics ='http://127.0.0.1:80/api1/routes/comic.php';
  public apiUser = 'http://127.0.0.1:80/api1/routes/usuario.php';

  constructor(private http: HttpClient) {}

  // Método para obtener los cómics
  getComics(): Observable<Comics> {
    return this.http.get<Comics>(this.apiComics).pipe(
      map(resp => resp)
    );
  }

  // Método para enviar datos por POST
  postComic(comic: any): Observable<any> {
    return this.http.post<any>(this.apiComics, comic);
  }

  // Método para actualizar un cómic por ID
  updateComic(id: number, comic: any): Observable<any> {
    const url = `${this.apiComics}/${id}`;
    return this.http.put<any>(url, comic);
  }

  // Método para eliminar un cómic por ID
  deleteComic(id: number): Observable<any> {
    const url = `${this.apiComics}/${id}`;
    return this.http.delete<any>(url);
  }

/*-------------------Maestros------------------------------- */  

  // Método para obtener los datos
  getTopHeadlines(): Observable<TopLevel> {
    return this.http.get<TopLevel>(this.apiUrl).pipe(
      map(resp => resp)
    );
  }

  // Método para enviar datos por POST
  postDatos(datos: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, datos);

  }
    // Método para eliminar datos por ID
    deleteDato(id: number): Observable<any> {
      const url = `${this.apiUrl}?id_maestro=${id}`;
      return this.http.delete<any>(url);
    }

//-----------------User------------------

  // Método para obtener los datos
  getUser(): Observable<Yuser> {
    return this.http.get<Yuser>(this.apiUser).pipe(
      map(resp => resp)
    );
  }

  // Método para enviar datos por POST
  postDatosUser(datos: any): Observable<any> {
    return this.http.post<any>(this.apiUser, datos);

  }
    // Método para eliminar datos por ID
    deleteDatoUser(id: number): Observable<any> {
      const url = `${this.apiUser}?id=${id}`;
      return this.http.delete<any>(url);
    }

  //verificacion
  verifyCredentials(email: string, password: string): Observable<any> {
    const credentials = {
      correo: email,
      contrasena: password,
      action: 'verifyCredentials'
    };
    return this.http.post<any>(this.apiUser, credentials);
  }
}


