import { Component, OnInit, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { EditoraService } from 'src/app/services/editora/editora.service';
import { MatTable } from '@angular/material/table';

@Component({
  selector: 'app-editora-all',
  templateUrl: './editora-all.component.html',
  styleUrls: ['./editora-all.component.css']
})
export class EditoraAllComponent implements OnInit {

  editoras = []
  @ViewChild(MatTable) table: MatTable<any>

  displayedColumns = ['id', 'nome', 'action']

  constructor(
    private router: Router,
    private editoraService: EditoraService
  ) { }

  ngOnInit(): void {
    this.getEditora()
  }

  getEditora() {
    this.editoraService.get()
      .then((res: any) => {
        this.editoras = res
      })
      .catch(error => {
        console.log(error)
      })
  }

}
