import { Injectable } from '@angular/core';
import { Http, Response, RequestOptionsArgs } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class BaseRestClient {
    public baseUrl: string = API_URL;

    constructor(public http: Http) {}

    public get(url:string, options?: RequestOptionsArgs) {
        return this.http.get(this.baseUrl + url, options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    public post(url:string, body:any, options?: RequestOptionsArgs) {
        return this.http.post(this.baseUrl + url, body, options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    private extractData(res: Response) {
        let body = res.json();
        return body.data || { };
    }

    private handleError (error: any) {
        let errMsg = (error.message) ? error.message :
            error.status ? `${error.status} - ${error.statusText}` : 'Server error';
        return Observable.throw(errMsg);
    }
}
