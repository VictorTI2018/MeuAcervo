import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { API_URL } from 'src/app/utils/api';

@Injectable({
  providedIn: 'root'
})
export class EditoraService {

  constructor(
    private httpClient: HttpClient
  ) { }

  get() {
    return this.httpClient.get(`${API_URL}/editora`).toPromise()
  }
}
