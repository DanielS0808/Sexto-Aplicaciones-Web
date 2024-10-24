import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { AppRoutingModule } from './app.routing';
import { ComponentsModule } from './components/components.module';
import { AppComponent } from './app.component';
import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatSelectModule } from '@angular/material/select';
import { NuevoClienteComponent } from './clientes/nuevocliente/nuevocliente.component';
import { NuevoProcuradorComponent } from './procuradores/nuevoprocurador/nuevoprocurador.component';
import { NuevoexpedienteComponent } from './expedientes/nuevoexpediente/nuevoexpediente.component';

@NgModule({
  imports: [
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    ComponentsModule,
    RouterModule,
    AppRoutingModule,
    MatFormFieldModule,
    MatInputModule,
    FormsModule,
    MatSelectModule
  ],
  declarations: [
    AppComponent,
    AdminLayoutComponent,    
    NuevoClienteComponent,     
    NuevoProcuradorComponent, 
    NuevoexpedienteComponent    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
