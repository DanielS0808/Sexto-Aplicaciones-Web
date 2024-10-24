import { Routes } from '@angular/router';

import { DashboardComponent } from '../../dashboard/dashboard.component';
import { UserProfileComponent } from '../../user-profile/user-profile.component';
import { TableListComponent } from '../../table-list/table-list.component';
import { TypographyComponent } from '../../typography/typography.component';
import { IconsComponent } from '../../icons/icons.component';
import { MapsComponent } from '../../maps/maps.component';
import { NotificationsComponent } from '../../notifications/notifications.component';
import { UpgradeComponent } from '../../upgrade/upgrade.component';
import { ClientesComponent } from '../../clientes/clientes.component';
import { NuevoClienteComponent } from '../../clientes/nuevocliente/nuevocliente.component';
import { ProcuradoresComponent } from '../../procuradores/procuradores.component';
import { NuevoProcuradorComponent } from '../../procuradores/nuevoprocurador/nuevoprocurador.component';  
import { ExpedientesComponent } from '../../expedientes/expedientes.component';
import { NuevoexpedienteComponent } from '../../expedientes/nuevoexpediente/nuevoexpediente.component';

export const AdminLayoutRoutes: Routes = [   
    { path: 'dashboard',      component: DashboardComponent },
    { path: 'user-profile',   component: UserProfileComponent },
    { path: 'table-list',     component: TableListComponent },        
    { path: 'typography',     component: TypographyComponent },
    { path: 'icons',          component: IconsComponent },
    { path: 'maps',           component: MapsComponent },
    { path: 'notifications',  component: NotificationsComponent },
    { path: 'upgrade',        component: UpgradeComponent },    
    { path: 'clientes', component: ClientesComponent},
    { path: 'nuevocliente', component: NuevoClienteComponent},
    { path: 'nuevocliente/:id', component: NuevoClienteComponent},
    { path: 'procuradores', component: ProcuradoresComponent},
    { path: 'nuevoprocurador', component: NuevoProcuradorComponent},
    { path: 'nuevoprocurador/:id', component: NuevoProcuradorComponent},
    { path: 'expedientes', component: ExpedientesComponent},
    { path: 'nuevoexpediente', component: NuevoexpedienteComponent},
    { path: 'nuevoexpediente/:id', component: NuevoexpedienteComponent}
];
