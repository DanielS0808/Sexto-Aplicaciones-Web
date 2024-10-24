import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ExpedientesService } from '../../Services/expedientes.service';
import { IExpediente } from '../../Interfaces/iexpedientes';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoexpediente',
  templateUrl: './nuevoexpediente.component.html',
  styleUrls: ['./nuevoexpediente.component.scss']
})
export class NuevoexpedienteComponent implements OnInit {
  expediente: IExpediente = {
    exp_cod: '',
    exp_des: '',
    cli_id: '',
    cli_cod: ''
  };
  idExpediente: number = 0;
  titulo = '';
  
  constructor(
    private expedientesService: ExpedientesService,
    private ruta: ActivatedRoute,
    private router: Router 
  ) { }

  ngOnInit(): void {
    this.idExpediente = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idExpediente > 0) {
      this.titulo = 'Editar Expediente';
      this.expedientesService.uno(this.idExpediente).subscribe((data: IExpediente) => {
        this.expediente = data;
      });      
    } else {
      this.titulo = 'Nuevo Expediente';
    }
  }

  grabar() {
    if(!this.expediente.exp_cod || !this.expediente.exp_des || !this.expediente.cli_id) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    if (this.idExpediente > 0) {
      this.expedientesService.actualizar(this.expediente).subscribe((res: any) => {
        Swal.fire('Actualizado el Expedinete', res.mensaje, 'success');
        this.router.navigate(['/expedientes']);
      });
    } else {
      this.expedientesService.insertar(this.expediente).subscribe((res: any) => {
        Swal.fire('Cliente insertado correctamente', res.mensaje, 'success');
        this.router.navigate(['/expedientes']);
      });
    }    
  }

}
