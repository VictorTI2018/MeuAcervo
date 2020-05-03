import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'

import { AutorService } from 'src/app/services/autor/autor.service';
import { Router } from '@angular/router';

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
    private router: Router
  ) { }

  ngOnInit(): void {
    this.autorForm = this.formBuilder.group({
      nome: [''],
      sobrenome: ['']
    })
  }

  save(): void {
    if (this.autorForm.valid) {
      let model = Object.assign(this.autorForm.value)
      this.autorService.insert(model)
        .then((res: any) => {
          if(res.status === true) {
            this.autorService.showMessage("Cadastrado com sucesso...")
            this.router.navigate(['/autors'])
          }
        })
    } else {
      this.autorService.showMessage("Por favor preencha todos os campos")
    }
  }
}
