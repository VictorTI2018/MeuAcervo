import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'

import { AutorService } from 'src/app/services/autor/autor.service';
import { Router, ActivatedRoute } from '@angular/router';

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
    private activedRouter: ActivatedRoute
  ) { }

  ngOnInit(): void {
    this.autorForm = this.formBuilder.group({
      id: [''],
      nome: [''],
      sobrenome: ['']
    })
    this.getQueryParams()
  }

  save(): void {
    if (this.autorForm.valid) {
      let model = Object.assign(this.autorForm.value)
      this.autorService.insert(model)
        .then((res: any) => {
          if (res.status === true) {
            this.autorService.showMessage("Cadastrado com sucesso...")
            this.router.navigate(['/autors'])
          }
        })
    } else {
      this.autorService.showMessage("Por favor preencha todos os campos")
    }
  }

  getQueryParams() {
    this.autorForm.get('id').setValue(this.activedRouter.snapshot.queryParamMap.get('id'))
    if (this.autorForm.get('id').value > 0) {
      let id_autor = this.autorForm.get('id').value
      this.autorService.find(id_autor)
        .then((res: any) => {
          this.autorForm.get('nome').setValue(res.nome)
          this.autorForm.get('sobrenome').setValue(res.sobrenome)
        })
    }
  }
}
