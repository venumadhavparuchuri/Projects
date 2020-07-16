import {NgModule} from "@angular/core"
import {aboutComponent} from './about.component';
import {CommonModule} from "@angular/common";
import {HttpClientModule} from '@angular/common/http';
import {TokenModule} from '../token/token.module'; 
import { aboutService } from './about.service';
import {RouterModule} from '@angular/router'
@NgModule
({
    declarations:[aboutComponent],
    
    imports:[CommonModule,//In order to recognize child component
            HttpClientModule,  
            TokenModule ,
            RouterModule.forChild([{path:"",component:aboutComponent}])],

    providers:[aboutService]  ,
    exports:[aboutComponent]      
})

export class AboutModule{}
