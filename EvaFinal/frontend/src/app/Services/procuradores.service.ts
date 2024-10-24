import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IProcurador } from 'app/Interfaces/iprocurador';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProcuradoresService {
  apiurl = 'http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/controllers/procuradores.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<IProcurador[]> {
    return this.http.get<IProcurador[]>(this.apiurl + 'todos');
  }

  uno(id: number): Observable<IProcurador> {
    const formData = new FormData();
    formData.append('pro_id', id.toString());
    return this.http.post<IProcurador>(this.apiurl + 'uno', formData);
  }

  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('pro_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(procurador: IProcurador): Observable<string> {
    const formData = new FormData();
    formData.append('pro_cod', procurador.pro_cod);
    formData.append('pro_nom', procurador.pro_nom);
    formData.append('pro_ape', procurador.pro_ape);    
    formData.append('pro_cel', procurador.pro_cel);
    formData.append('pro_ema', procurador.pro_ema);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(procurador: IProcurador): Observable<string> {
    const formData = new FormData();
    formData.append('pro_id', procurador.pro_id!.toString());
    formData.append('pro_cod', procurador.pro_cod);
    formData.append('pro_nom', procurador.pro_nom);
    formData.append('pro_ape', procurador.pro_ape);    
    formData.append('pro_cel', procurador.pro_cel);
    formData.append('pro_ema', procurador.pro_ema);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
