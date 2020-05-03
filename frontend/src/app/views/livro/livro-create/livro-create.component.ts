import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'
import { LivroService } from 'src/app/services/livro/livro.service';
import { Router } from '@angular/router';
import { MessageService } from 'src/app/services/message/message.service';
import { EditoraService } from 'src/app/services/editora/editora.service';
import { AutorService } from 'src/app/services/autor/autor.service';

@Component({
  selector: 'app-livro-create',
  templateUrl: './livro-create.component.html',
  styleUrls: ['./livro-create.component.css']
})
export class LivroCreateComponent implements OnInit {

  livroForm: FormGroup
  editoras = []
  autores = []

  constructor(
    private formBuiler: FormBuilder,
    private livroService: LivroService,
    private route: Router,
    private message: MessageService,
    private editoraService: EditoraService,
    private autorSertvice: AutorService
  ) { }

  ngOnInit(): void {
    this.livroForm = this.formBuiler.group({
      nome: [''],
      data_pub: [''],
      descricao: [''],
      editora_id: [0],
      autor_id: [0]
    })
    this.getEditora()
    this.getAutores()
  }

  getEditora() {
    this.editoraService.get().then((res: any) => {
      this.editoras = res
    }).catch(error => {
      console.log(error)
    })
  }

  getAutores() {
    this.autorSertvice.get().then((res: any) => {
      this.autores = res
    }).catch(error => {
      console.log(error)
    })
  }
}
