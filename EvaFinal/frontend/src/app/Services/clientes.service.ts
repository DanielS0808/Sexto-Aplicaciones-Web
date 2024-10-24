import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ICliente } from 'app/Interfaces/icliente';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClientesService {
  apiurl = 'http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/controllers/clientes.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<ICliente[]> {
    return this.http.get<ICliente[]>(this.apiurl + 'todos');
  }

  uno(id: number): Observable<ICliente> {
    const formData = new FormData();
    formData.append('cli_id', id.toString());
    return this.http.post<ICliente>(this.apiurl + 'uno', formData);
  }

  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('cli_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(cliente: ICliente): Observable<string> {
    const formData = new FormData();
    formData.append('cli_cod', cliente.cli_cod);
    formData.append('cli_nom', cliente.cli_nom);
    formData.append('cli_ape', cliente.cli_ape);
    formData.append('cli_dir', cliente.cli_dir);
    formData.append('cli_cel', cliente.cli_cel);
    formData.append('cli_ema', cliente.cli_ema);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(cliente: ICliente): Observable<string> {
    const formData = new FormData();
    formData.append('cli_id', cliente.cli_id!.toString());
    formData.append('cli_cod', cliente.cli_cod);
    formData.append('cli_nom', cliente.cli_nom);
    formData.append('cli_ape', cliente.cli_ape);
    formData.append('cli_dir', cliente.cli_dir);
    formData.append('cli_cel', cliente.cli_cel);
    formData.append('cli_ema', cliente.cli_ema);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
