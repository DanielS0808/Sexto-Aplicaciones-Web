import { Component, OnInit } from '@angular/core';
import { IExpediente } from '../Interfaces/iexpedientes'; 
import { ExpedientesService } from '../Services/expedientes.service'; 
import Swal from 'sweetalert2'; 
import { Router } from '@angular/router';


@Component({
  selector: 'app-expedientes',
  templateUrl: './expedientes.component.html',
  styleUrls: ['./expedientes.component.scss']
})
export class ExpedientesComponent implements OnInit {
  expedientes: IExpediente[] = [];

  constructor(private expedientesService: ExpedientesService, private router: Router) { }

  ngOnInit(): void {
    this.cargarExpedientes();
    //this.cargarClientes();
  }

  cargarClientes(): void {
    this.expedientesService.obtCliente().subscribe((data: IExpediente[]) => {
      this.expedientes = data;
    });
  }

  cargarExpedientes(): void {
    this.expedientesService.todos().subscribe((data: IExpediente[]) => {
      this.expedientes = data;
    });
  }

  insertar():void{
    Swal.fire('Formulario para agregar Expediente'); 
  }

  actualizar(expediente: IExpediente):void{
    Swal.fire('Editar Expediente: ${expediente.exp_cod} ${expediente.exp_des} ${expediente.cli_id}');
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
        this.expedientesService.eliminar(id).subscribe(() => {
          Swal.fire('¡Eliminado!', 'El expediente ha sido eliminado', 'success');
          this.cargarExpedientes();          
        });
      }
    });
  }

  generarReporte():void{
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/reports/expedientes.report.php', '_blank');
  }

  agregarExpediente() {
    this.router.navigate(['/nuevoexpediente']);
  }

  editarExpediente(id: number) {
    this.router.navigate(['/nuevoexpediente', id]);
  }
}
