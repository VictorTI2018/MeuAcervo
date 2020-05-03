import { Component, OnInit } from '@angular/core';
import { AutorService } from 'src/app/services/autor/autor.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-autor-all',
  templateUrl: './autor-all.component.html',
  styleUrls: ['./autor-all.component.css']
})
export class AutorAllComponent implements OnInit {

  autores = []

  displayedColumns = ['id', 'nome', 'sobrenome', 'action']

  constructor(
    private autorService: AutorService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.getAutores()
  }

  getAutores() {
    this.autorService.get()
      .then((res: any) => {
        this.autores = res
      }).catch(error => {
        console.log(error)
      })
  }

  editarAutor(id: number) {
    this.router.navigate(["/autor-create"], { queryParams: { id: id } })
  }
}
