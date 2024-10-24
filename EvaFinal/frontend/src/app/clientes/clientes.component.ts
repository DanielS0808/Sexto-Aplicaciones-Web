import { Component, OnInit } from '@angular/core';
import { ICliente } from '../Interfaces/icliente';
import { ClientesService } from '../Services/clientes.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-clientes',
  templateUrl: './clientes.component.html',
  styleUrls: ['./clientes.component.scss']
})
export class ClientesComponent implements OnInit {
  clientes: ICliente[] = [];

  constructor(private clientesService: ClientesService, private router: Router) { }

  ngOnInit(): void {
    this.cargarClientes();
  }

  cargarClientes(): void {
    this.clientesService.todos().subscribe((data: ICliente[]) => {
      this.clientes = data;
    });
  }

  insertar():void{
    Swal.fire('Formulario para agregar Cliente'); 
  }

  actualizar(cliente: ICliente):void{
    Swal.fire('Editar Cliente: ${cliente.cli_cod} ${cliente.cli_nom} ${cliente.cli_ape}');
  }

  eliminar(id: number):void{
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede deshacer',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        this.clientesService.eliminar(id).subscribe(() => {
          Swal.fire('¡Eliminado!', 'El cliente ha sido eliminado', 'success');
          this.cargarClientes();          
        });
      }
    });
  }

  generarReporte():void{
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/reports/clientes.report.php', '_blank');
  }

  agregarCliente() {
    this.router.navigate(['/nuevocliente']);
  }

  editarCliente(id: number) {
    this.router.navigate(['/nuevocliente', id]);
  }
}