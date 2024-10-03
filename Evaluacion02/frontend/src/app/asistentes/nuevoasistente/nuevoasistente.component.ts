import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IAsistente } from '../../Interfaces/iasistente';
import { AsistentesService } from '../../Services/asistentes.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoasistente',
  templateUrl: './nuevoasistente.component.html',
  styleUrls: ['./nuevoasistente.component.scss']
})
export class NuevoAsistenteComponent implements OnInit {
  asistente: IAsistente = {
    nombre: '', 
    apellido: '', 
    email: '', 
    telefono: ''
  };
  idAsistente: number = 0;
  titulo = '';

  constructor(
    private asistentesService: AsistentesService,
    private ruta: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.idAsistente = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idAsistente > 0) {
      this.titulo = 'Editar Asistente';
      this.asistentesService.uno(this.idAsistente).subscribe((data: IAsistente) => {
        this.asistente = data;
      })
    } else {
      this.titulo = 'Nuevo Asistente';
    }
  }

  grabar() {
    if(!this.asistente.nombre || !this.asistente.apellido || !this.asistente.email || !this.asistente.telefono) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    if (this.idAsistente > 0) {
      this.asistentesService.actualizar(this.asistente).subscribe((res: any) => {
        Swal.fire('Actualizado el Asistente', res.mensaje, 'success');
        this.router.navigate(['/asistentes']);
      });
    } else {
      this.asistentesService.insertar(this.asistente).subscribe((res: any) => {
        Swal.fire('Asistente insertado correctamente', res.mensaje, 'success');
        this.router.navigate(['/asistentes']);
      });
    }    
  }
}