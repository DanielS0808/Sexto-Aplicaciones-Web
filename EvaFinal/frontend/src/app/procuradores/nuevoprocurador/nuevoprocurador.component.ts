import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProcuradoresService } from '../../Services/procuradores.service';  
import { IProcurador } from '../../Interfaces/iprocurador';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoprocurador',
  templateUrl: './nuevoprocurador.component.html',
  styleUrls: ['./nuevoprocurador.component.scss']
})
export class NuevoProcuradorComponent implements OnInit {
  procurador : IProcurador = {
    pro_cod: '',
    pro_nom: '',
    pro_ape: '',
    pro_cel: '',
    pro_ema: '',
  };
  idProcurador: number = 0;
  titulo = '';

  constructor(
    private procuradoresService: ProcuradoresService,
    private ruta: ActivatedRoute,
    private router: Router    
  ) { }

  ngOnInit(): void {
    this.idProcurador = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idProcurador > 0) {
      this.titulo = 'Editar Procurador';
      this.procuradoresService.uno(this.idProcurador).subscribe((data: IProcurador) => {
        this.procurador = data;
      });      
    } else {
      this.titulo = 'Nuevo Procurador';
    }
  }

  grabar() {
    if(!this.procurador.pro_cod || !this.procurador.pro_nom || !this.procurador.pro_ape || !this.procurador.pro_cel) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    if (this.idProcurador > 0) {
      this.procuradoresService.actualizar(this.procurador).subscribe((res: any) => {
        Swal.fire('Actualizado el Procurador', res.mensaje, 'success');
        this.router.navigate(['/procuradores']);
      });
    } else {
      this.procuradoresService.insertar(this.procurador).subscribe((res: any) => {
        Swal.fire('Procurador insertado correctamente', res.mensaje, 'success');
        this.router.navigate(['/procuradores']);
      });
    }    
  }
}
