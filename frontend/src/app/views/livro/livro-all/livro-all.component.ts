import { Component, OnInit, ViewChild } from '@angular/core';
import { MatTable } from '@angular/material/table';
import { LivroService } from 'src/app/services/livro/livro.service';

@Component({
  selector: 'app-livro-all',
  templateUrl: './livro-all.component.html',
  styleUrls: ['./livro-all.component.css']
})
export class LivroAllComponent implements OnInit {

  livros = []
  @ViewChild(MatTable) table: MatTable<any>

  displayedColumns = ['id', 'nome', 'data_pub', 'autor.nome', 'editora.nome', 'action']
  constructor(
    private livroService: LivroService
  ) { }

  ngOnInit(): void {
    this.getLivros()
  }

  getLivros() {
    this.livroService.get()
      .then((res: any) => {
        this.livros = res
      }).catch(error => {
        console.log(error)
      })
  }

}
