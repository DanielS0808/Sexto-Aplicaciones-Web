import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IExpediente }  from 'app/Interfaces/iexpedientes';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ExpedientesService {
  apiurl = 'http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/controllers/expedientes.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<IExpediente[]> {
    return this.http.get<IExpediente[]>(this.apiurl + 'todos');
  }

  obtCliente(): Observable<IExpediente[]> {
    return this.http.get<IExpediente[]>(this.apiurl + 'obt_clientes');
  }

  uno(id: number): Observable<IExpediente> {
    const formData = new FormData();
    formData.append('exp_id', id.toString());
    return this.http.post<IExpediente>(this.apiurl + 'uno', formData);
  }

  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('exp_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(expediente: IExpediente): Observable<string> {
    const formData = new FormData();
    formData.append('exp_cod', expediente.exp_cod);
    formData.append('exp_des', expediente.exp_des);
    formData.append('cli_id', expediente.cli_id);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(expediente: IExpediente): Observable<string> {
    const formData = new FormData();
    formData.append('exp_id', expediente.exp_id!.toString());
    formData.append('exp_cod', expediente.exp_cod);
    formData.append('exp_des', expediente.exp_des);
    formData.append('cli_id', expediente.cli_id);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
