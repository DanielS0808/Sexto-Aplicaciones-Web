import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IConferencia } from '../../Interfaces/iconferencia';
import { ConferenciasService } from '../../Services/conferencias.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevaconferencia',
  templateUrl: './nuevaconferencia.component.html',
  styleUrls: ['./nuevaconferencia.component.scss']
})
export class NuevaConferenciaComponent implements OnInit {
  conferencia: IConferencia = {
    nombre: '', 
    fecha: '', 
    ubicacion: '', 
    descripcion: ''
  };
  idConferencia: number = 0;
  titulo = '';

  constructor(
    private conferenciasService: ConferenciasService,
    private ruta: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.idConferencia = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idConferencia > 0) {
      this.titulo = 'Editar Conferencia';
      this.conferenciasService.uno(this.idConferencia).subscribe((data: IConferencia) => {
        this.conferencia = data;
      })
    } else {
      this.titulo = 'Nueva Conferencia';
    }
  }

  grabar() {
    if(!this.conferencia.nombre || !this.conferencia.fecha || !this.conferencia.ubicacion || !this.conferencia.descripcion) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    if (this.idConferencia > 0) {
      this.conferenciasService.actualizar(this.conferencia).subscribe((res: any) => {
        Swal.fire('Actualizada la conferencia', res.mensaje, 'success');
        this.router.navigate(['/conferencias']);
      });
    } else {
      this.conferenciasService.insertar(this.conferencia).subscribe((res: any) => {
        Swal.fire('Conferencia insertada correctamente', res.mensaje, 'success');
        this.router.navigate(['/conferencias']);
      });
    }    
  }
}
