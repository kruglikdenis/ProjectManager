import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { ITransformer } from '../transformers/interface.transformer';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class BaseRestClient {

    private baseUrl = API_URL;
    private headers: Headers;
    private transformer: ITransformer;

    constructor(private http: Http) {
        this.headers = new Headers({
            'Content-Type': 'application/json'
        });
    }

    public get(url) {
        let promice = this.http
            .get(this.baseUrl + url, {headers: this.headers})
            .toPromise()
            .then(this.extractData);

        if (this.transformer) {
            promice = promice.then(this.transformer.transform);
        }

        return promice;
    }

    public post(url, data) {
        let promice = this.http
            .post(this.baseUrl + url, data, {headers: this.headers})
            .toPromise()
            .then(this.extractData);

        if (this.transformer) {
            promice = promice.then(this.transformer.transform);
        }

        return promice;
    }

    public appendHeader(key: string, value: string): void {
        this.headers.append(key, value);
    }

    public setTransformer(transformer: ITransformer) {
        this.transformer = transformer;

        return this;
    }

    private extractData(res: Response) {
        return res.json() || { };
    }
}
