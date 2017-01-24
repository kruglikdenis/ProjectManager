import { Injectable } from '@angular/core';
import { Http, Headers, Response, URLSearchParams } from '@angular/http';
import { BaseResponse } from './../../models/response';
import { ITransformer } from '../transformers/interface.transformer';
import { StorageService } from '../../services/storage.service';
import { Observable } from 'rxjs/Observable';
import { AppSettings } from './../../../app.settings';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class BaseRestClient {
    private AUTHORIZATION_HEADER = 'Authorization';

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
            .get(AppSettings.API_ENDPOINT + url, {
                    headers: this.headers,
                    search: this.initUrlSearchParams(params)
                }
            );

        return this.toPromice(observable, transformer);
    }

    public post(url, data, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .post(AppSettings.API_ENDPOINT + url, data, {headers: this.headers});

        return this.toPromice(observable, transformer);
    }

    public patch(url, data, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .patch(AppSettings.API_ENDPOINT + url, data, {headers: this.headers});

        return this.toPromice(observable, transformer);
    }

    public delete(url, transformer: ITransformer = null) {
        let observable = this.authorize()
            .http
            .delete(AppSettings.API_ENDPOINT + url, {headers: this.headers});

        return this.toPromice(observable, transformer);
    }

    private toPromice(observable: Observable<Response>, transformer: ITransformer) {
        // noinspection TypeScriptUnresolvedFunction
        let promice = observable
            .toPromise()
            .then(this.extractData);

        if (transformer) {
            promice = promice.then(resource => {
                return {
                    headers: resource.headers,
                    data: transformer.transform(resource.data)
                };
            });
        }

        return promice;
    }

    private extractData(response: Response): BaseResponse {
        if (response.status >= 200 && response.status < 300) {
            if (response.status !== 204) {
                return new BaseResponse(response);
            }
        }
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

    private initUrlSearchParams(resource: any) {
        let params: URLSearchParams = new URLSearchParams();

        for (let key in resource) {
            if (resource.hasOwnProperty(key)) {
                params.set(key, resource[key]);
            }
        }

        return params;
    }

}
