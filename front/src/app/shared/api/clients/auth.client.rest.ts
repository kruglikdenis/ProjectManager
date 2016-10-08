import { Injectable } from '@angular/core';
import { Request, Response } from 'angular2/http';
import { RESTClient, BaseUrl } from 'angular2-rest';

@Injectable()
@BaseUrl(API_URL)
export class AuthRestClient extends RESTClient {

}
