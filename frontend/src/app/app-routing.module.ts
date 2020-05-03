import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './views/home/home.component'
import { AutorComponent } from './views/autor/autor.component';
import { AutorCreateComponent } from './views/autor/autor-create/autor-create.component';
import { EditoraComponent } from './views/editora/editora.component';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  {
    path: 'autors', component: AutorComponent
  },
  { path: 'autor-create', component: AutorCreateComponent },
  { path: 'autor-edit', component: AutorCreateComponent },
  { path: 'editoras', component: EditoraComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
