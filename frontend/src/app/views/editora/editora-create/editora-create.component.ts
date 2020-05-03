import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms'

@Component({
  selector: 'app-editora-create',
  templateUrl: './editora-create.component.html',
  styleUrls: ['./editora-create.component.css']
})
export class EditoraCreateComponent implements OnInit {

  editoraForm: FormGroup

  constructor(
    private formBuilder: FormBuilder
  ) { }

  ngOnInit(): void {
    this.editoraForm = this.formBuilder.group({
      nome: ['']
    })
  }

  handleSubmit() {
    if(this.editoraForm.valid) {

    } else {
      
    }
  }

}
