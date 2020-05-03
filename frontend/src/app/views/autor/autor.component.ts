import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-autor',
  templateUrl: './autor.component.html',
  styleUrls: ['./autor.component.css']
})
export class AutorComponent implements OnInit {

  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  novoAutor(): void {
    this.router.navigate(["/autor-create"])
  }
}
