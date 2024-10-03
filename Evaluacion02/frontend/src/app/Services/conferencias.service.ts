import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IConferencia } from 'app/Interfaces/iconferencia';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ConferenciasService {
  apiurl = 'http://localhost/Sexto-Aplicaciones-Web/Evaluacion02/backend/controllers/conferencias.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<IConferencia[]> {
    return this.http.get<IConferencia[]>(this.apiurl + 'todos');
  }

  uno(id: number): Observable<IConferencia> {
    const formData = new FormData();
    formData.append('conferencia_id', id.toString());
    return this.http.post<IConferencia>(this.apiurl + 'uno', formData);
  }

  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('conferencia_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(conferencia: IConferencia): Observable<string> {
    const formData = new FormData();
    formData.append('nombre', conferencia.nombre);
    formData.append('fecha', conferencia.fecha);
    formData.append('ubicacion', conferencia.ubicacion);
    formData.append('descripcion', conferencia.descripcion);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(conferencia: IConferencia): Observable<string> {
    const formData = new FormData();
    formData.append('conferencia_id', conferencia.conferencia_id!.toString()); 
    formData.append('nombre', conferencia.nombre);
    formData.append('apellido', conferencia.fecha);
    formData.append('email', conferencia.ubicacion);
    formData.append('telefono', conferencia.descripcion);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
