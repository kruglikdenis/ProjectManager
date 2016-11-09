import { Headers, Response } from '@angular/http';

export class BaseResponse {
    data: any;
    headers: Headers;

    constructor(response: Response) {
        this.data = response.json();
        this.headers = response.headers;
    }
}
