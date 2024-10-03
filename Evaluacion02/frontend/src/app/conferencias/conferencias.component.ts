import { Component, OnInit } from '@angular/core';
import { IConferencia } from 'app/Interfaces/iconferencia';
import { ConferenciasService } from '../Services/conferencias.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-conferencias',
  templateUrl: './conferencias.component.html',
  styleUrls: ['./conferencias.component.scss']
})
export class ConferenciasComponent implements OnInit {
  conferencias: IConferencia[] = [];

  constructor(private conferenciasService: ConferenciasService, private router: Router) { }

  ngOnInit(): void {
    this.cargarConferencias();
  }

  cargarConferencias(): void {
    this.conferenciasService.todos().subscribe((data: IConferencia[]) => {
      this.conferencias = data;
    });
  }

  insertar(): void {    
    Swal.fire('Formulario para agregar Conferencia'); 
  }

  actualizar(conferencia: IConferencia): void {    
    Swal.fire(`Editar Conferencia: ${conferencia.nombre} ${conferencia.fecha}`);
  }

  eliminar(id: number): void {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará la Conferencia',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        this.conferenciasService.eliminar(id).subscribe(() => {
          Swal.fire('Eliminado', 'La conferencia ha sido eliminado', 'success');
          this.cargarConferencias();
        });
      }
    });
  }

  generarReporte() {
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/Sexto-Aplicaciones-Web/Evaluacion02/backend/reports/conferencias.report.php', '_blank');
  }

  agregarConferencia() {
    this.router.navigate(['/nuevaconferencia']);
  }

  editarConferencia(id: number) {
    this.router.navigate(['/nuevaconferencia', id]);
  }



}
