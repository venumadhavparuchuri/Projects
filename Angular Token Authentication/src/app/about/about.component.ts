import { Component } from "@angular/core";
import { aboutService } from './about.service';
import { HttpErrorResponse } from '@angular/common/http';

@Component({

    selector:"about",
    templateUrl:"./about.component.html"

})

export class aboutComponent
{
public result:any;
constructor(public service: aboutService){}
ngOnInit()
{
    this.service.getData().subscribe((posRes)=>{this.result=posRes},
    (errRes:HttpErrorResponse)=>{console.log(errRes)})
}


}