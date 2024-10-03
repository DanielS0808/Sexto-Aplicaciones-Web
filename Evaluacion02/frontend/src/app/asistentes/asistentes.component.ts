import { Component, OnInit } from '@angular/core';
import { IAsistente } from '../Interfaces/iasistente';
import { AsistentesService } from '../Services/asistentes.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-asistentes',
  templateUrl: './asistentes.component.html',
  styleUrls: ['./asistentes.component.scss']
})
export class AsistentesComponent implements OnInit {
  asistentes: IAsistente[] = [];
  
  constructor(private asistentesService: AsistentesService, private router: Router) {}

  ngOnInit(): void {
    this.cargarAsistentes();
  }
  
  cargarAsistentes(): void {
    this.asistentesService.todos().subscribe((data: IAsistente[]) => {
      this.asistentes = data;
    });
  }

  insertar(): void {    
    Swal.fire('Formulario para agregar Asistente'); 
  }

  actualizar(asistente: IAsistente): void {    
    Swal.fire(`Editar Asistente: ${asistente.nombre} ${asistente.apellido}`);
  }

  eliminar(id: number): void {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará al Asistente',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        this.asistentesService.eliminar(id).subscribe(() => {
          Swal.fire('Eliminado', 'El asistente ha sido eliminado', 'success');
          this.cargarAsistentes();
        });
      }
    });
  }

  generarReporte() {
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/Sexto-Aplicaciones-Web/Evaluacion02/backend/reports/asistentes.report.php', '_blank');
  }

  agregarAsistente() {
    this.router.navigate(['/nuevoasistente']);
  }

  editarAsistente(id: number) {
    this.router.navigate(['/nuevoasistente', id]);
  }
}
