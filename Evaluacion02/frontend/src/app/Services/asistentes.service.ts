import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IAsistente } from 'app/Interfaces/iasistente';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AsistentesService {
  apiurl = 'http://localhost/Sexto-Aplicaciones-Web/Evaluacion02/backend/controllers/asistentes.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<IAsistente[]> {
    return this.http.get<IAsistente[]>(this.apiurl + 'todos');
  }

  uno(id: number): Observable<IAsistente> {
    const formData = new FormData();
    formData.append('asistente_id', id.toString());
    return this.http.post<IAsistente>(this.apiurl + 'uno', formData);
  }

  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('asistente_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(asistente: IAsistente): Observable<string> {
    const formData = new FormData();
    formData.append('nombre', asistente.nombre);
    formData.append('apellido', asistente.apellido);
    formData.append('email', asistente.email);
    formData.append('telefono', asistente.telefono);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(asistente: IAsistente): Observable<string> {
    const formData = new FormData();
    formData.append('asistente_id', asistente.asistente_id!.toString()); 
    formData.append('nombre', asistente.nombre);
    formData.append('apellido', asistente.apellido);
    formData.append('email', asistente.email);
    formData.append('telefono', asistente.telefono);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
