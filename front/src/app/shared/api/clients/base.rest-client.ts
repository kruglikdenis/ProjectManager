import { Injectable } from '@angular/core';
import { Http, Headers, Response, URLSearchParams } from '@angular/http';
import { ITransformer } from '../transformers/interface.transformer';
import { StorageService } from '../../services/storage.service';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class BaseRestClient {
    private AUTHORIZATION_HEADER = 'Authorization';

    private baseUrl = API_URL;
    private headers: Headers;

    constructor(
        private http: Http,
        private storageService: StorageService
    ) {
        this.headers = new Headers({
            'Content-Type': 'application/json'
        });
    }

    public get(url, params: Object, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .get(this.baseUrl + url, {
                    headers: this.headers,
                    search: this.initUrlSearchParams(params)
                }
            );

        return this.toPromice(observable, transformer);
    }

    public post(url, data, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .post(this.baseUrl + url, data, {headers: this.headers});

        return this.toPromice(observable, transformer);
    }

    public delete(url, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .delete(this.baseUrl + url, {headers: this.headers});

        return this.toPromice(observable, transformer);
    }

    private toPromice(observable: Observable<Response>, transformer: ITransformer) {
        let promice = observable
            .toPromise()
            .then(this.extractData);

        if (transformer) {
            promice = promice.then(transformer.transform);
        }

        return promice;
    }

    private extractData(responce: Response) {
        if (responce.status >= 200 && responce.status < 300) {
            if (responce.status !== 204) {
                return responce.json();
            }
        }

        return {};
    }

    private authorize() {
        this.headers.delete(this.AUTHORIZATION_HEADER);
        let session = this.storageService.getSession();

        if (session) {
            if (session.token) {
                this.headers.append(this.AUTHORIZATION_HEADER, session.token);
            }
        }

        return this;
    }

    private initUrlSearchParams(resource: Object) {
        let params: URLSearchParams = new URLSearchParams();

        for (let key in resource) {
            params.set(key, resource[key]);
        }

        return params;
    }

}
