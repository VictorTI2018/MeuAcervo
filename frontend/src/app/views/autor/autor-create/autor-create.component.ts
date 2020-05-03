import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-autor-create',
  templateUrl: './autor-create.component.html',
  styleUrls: ['./autor-create.component.css']
})
export class AutorCreateComponent implements OnInit {

  propLegal = "qualquer"

  constructor() { }

  ngOnInit(): void {
  }

  fazerAlgo():void {
    console.log("Fazendo algo")
  }

}
