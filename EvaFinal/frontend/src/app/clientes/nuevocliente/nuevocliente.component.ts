import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ClientesService } from '../../Services/clientes.service';
import { ICliente } from '../../Interfaces/icliente';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevocliente',
  templateUrl: './nuevocliente.component.html',
  styleUrls: ['./nuevocliente.component.scss']
})
export class NuevoClienteComponent implements OnInit {
  cliente : ICliente = {
    cli_cod: '',
    cli_nom: '',
    cli_ape: '',
    cli_dir: '',
    cli_cel: '',
    cli_ema: ''
  };
  idCliente: number = 0;
  titulo = '';

  constructor(
    private clientesService: ClientesService,
    private ruta: ActivatedRoute,
    private router: Router    
  ) { }

  ngOnInit(): void {
    this.idCliente = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idCliente > 0) {
      this.titulo = 'Editar Cliente';
      this.clientesService.uno(this.idCliente).subscribe((data: ICliente) => {
        this.cliente = data;
      });      
    } else {
      this.titulo = 'Nuevo Cliente';
    }
  }

  grabar() {
    if(!this.cliente.cli_cod || !this.cliente.cli_nom || !this.cliente.cli_ape || !this.cliente.cli_dir) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    if (this.idCliente > 0) {
      this.clientesService.actualizar(this.cliente).subscribe((res: any) => {
        Swal.fire('Actualizado el Cliente', res.mensaje, 'success');
        this.router.navigate(['/clientes']);
      });
    } else {
      this.clientesService.insertar(this.cliente).subscribe((res: any) => {
        Swal.fire('Cliente insertado correctamente', res.mensaje, 'success');
        this.router.navigate(['/clientes']);
      });
    }    
  }
}
