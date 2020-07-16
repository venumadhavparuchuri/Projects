import { Injectable } from "@angular/core";
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({

    providedIn:"root"
})

export class aboutService{
constructor(public http:HttpClient){}
public getData():Observable<any>
{
return this.http.get("http://localhost:8080/about")
}
}