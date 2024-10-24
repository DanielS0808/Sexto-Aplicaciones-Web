import { Component, OnInit } from '@angular/core';
import { IProcurador } from '../Interfaces/iprocurador';
import { ProcuradoresService } from '../Services/procuradores.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-procuradores',
  templateUrl: './procuradores.component.html',
  styleUrls: ['./procuradores.component.scss']
})
export class ProcuradoresComponent implements OnInit {
  procuradores: IProcurador[] = [];
  
  constructor(private procuradoresService: ProcuradoresService, private router: Router) { }

  ngOnInit(): void {
    this.cargarProcuradores();
  }

  cargarProcuradores(): void {
    this.procuradoresService.todos().subscribe((data: IProcurador[]) => {
      this.procuradores = data;
    });
  }

  insertar():void{
    Swal.fire('Formulario para agregar Procuradores'); 
  }

  actualizar(procurador: IProcurador):void{
    Swal.fire('Editar Procurador: ${procurador.pro_cod} ${procurador.pro_nom} ${procurador.pro_ape}');
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
        this.procuradoresService.eliminar(id).subscribe(() => {
          Swal.fire('¡Eliminado!', 'El procurador ha sido eliminado', 'success');
          this.cargarProcuradores();          
        });
      }
    });
  }

  generarReporte():void{
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/Sexto-Aplicaciones-Web/EvaFinal/backend/reports/procuradores.report.php', '_blank');
  }

  agregarProcurador() {
    this.router.navigate(['/nuevoprocurador']);
  }

  editarProcurador(id: number) {
    this.router.navigate(['/nuevoprocurador', id]);
  }

}
