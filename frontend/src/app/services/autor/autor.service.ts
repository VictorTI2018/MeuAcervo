import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Autor } from 'src/app/models/autor/autor.model';
import { API_URL } from 'src/app/utils/api';


@Injectable({
  providedIn: 'root'
})
export class AutorService {

  constructor(
    private httpClient: HttpClient
  ) { }



  get() {
    return this.httpClient.get(`${API_URL}/autor`).toPromise()
  }

  find(id: number) {
    return this.httpClient.get(`${API_URL}/autor/${id}`).toPromise()
  }

  insert(autor: Autor) {
    return this.httpClient.post(`${API_URL}/autor/register`, autor).toPromise()
  }

  edit(id: number, autor: Autor) {
    return this.httpClient.put(`${API_URL}/autor/edit/${id}`, autor).toPromise()
  }

  remove(id:number) {
    return this.httpClient.delete(`${API_URL}/autor/remove/${id}`).toPromise()
  }
}
