import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'

import { AutorService } from 'src/app/services/autor/autor.service';
import { Router, ActivatedRoute } from '@angular/router';
import { MessageService } from 'src/app/services/message/message.service';

@Component({
  selector: 'app-autor-create',
  templateUrl: './autor-create.component.html',
  styleUrls: ['./autor-create.component.css']
})
export class AutorCreateComponent implements OnInit {

  autorForm: FormGroup

  constructor(
    private autorService: AutorService,
    private formBuilder: FormBuilder,
    private router: Router,
    private activedRouter: ActivatedRoute,
    private message: MessageService
  ) { }

  ngOnInit(): void {
    this.autorForm = this.formBuilder.group({
      id: [''],
      nome: [''],
      sobrenome: ['']
    })
    this.getQueryParams()
  }

  handleSubmit() {
    if (this.autorForm.valid) {
      let res;
      const model = Object.assign(this.autorForm.value)
      if (model.id) {
        res = this.autorService.edit(model.id, model)
      }  else {
        res = this.autorService.insert(model)
      }
      res.then((r: any) => {
        if (r.status) {
          let message = `${model.id ? 'Atualizado com sucesso...' : 'Cadastrado com sucesso...'}`
          this.message.showMessage(message)
          setTimeout(() => {
            this.router.navigate(['/autors'])
          }, 500)
        }
      })
    } else {
      this.message.showMessage("Por favor preencha todos os campos")
    }
  }


  getQueryParams() {
    let id = Number(this.activedRouter.snapshot.queryParamMap.get('id'))
    if (id > 0) {
      this.autorForm.get('id').setValue(id)
      this.autorService.find(id)
        .then((res: any) => {
          this.autorForm.get('nome').setValue(res.nome)
          this.autorForm.get('sobrenome').setValue(res.sobrenome)
        })
    }
  }
}
