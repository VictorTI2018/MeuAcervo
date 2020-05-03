import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

import { MatSnackBar } from '@angular/material/snack-bar'
import { HttpClient } from '@angular/common/http';
import { Autor } from 'src/app/models/autor/autor.model';
import { API_URL } from 'src/app/utils/api';


@Injectable({
  providedIn: 'root'
})
export class AutorService {

  constructor(
    private snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) { }

  showMessage(msg: string): void {
    this.snackBar.open(msg, 'X', {
      duration: 3000,
      horizontalPosition: "center",
      verticalPosition: 'top'
    })
  }

  get() {
    return this.httpClient.get(`${API_URL}/autor`).toPromise()
  }

  find(id: number) {
    return this.httpClient.get(`${API_URL}/autor/${id}`).toPromise()
  }

  insert(autor: Autor) {
    return this.httpClient.post(`${API_URL}/autor/register`, autor).toPromise()
  }
}
