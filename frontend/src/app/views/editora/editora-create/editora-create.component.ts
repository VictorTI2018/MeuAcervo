import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'
import { EditoraService } from 'src/app/services/editora/editora.service';

@Component({
  selector: 'app-editora-create',
  templateUrl: './editora-create.component.html',
  styleUrls: ['./editora-create.component.css']
})
export class EditoraCreateComponent implements OnInit {

  editoraForm: FormGroup

  constructor(
    private formBuilder: FormBuilder,
    private editoraService: EditoraService
  ) { }

  ngOnInit(): void {
    this.editoraForm = this.formBuilder.group({
      id: [''],
      nome: ['']
    })
  }

  handleSubmit() {
    if(this.editoraForm.valid) {
      const model = Object.assign(this.editoraForm.value)
      let res;
      if(!model.id) {
        res = this.editoraService
      }
    } else {

    }
  }

}
