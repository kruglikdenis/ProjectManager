import { Injectable } from '@angular/core';

declare var $: any;

@Injectable()
export class ModalService {
    open(identifier: string) {
        $(`#${identifier}`).modal('show');
    }

    close(identifier: string) {
        $(`#${identifier}`).modal('hide');
    }
}
