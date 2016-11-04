import { Injectable } from '@angular/core';

@Injectable()
export class ModalService {
    open(identifier: string) {
        $(`#${identifier}`).modal('show');
    }

    close(identifier: string) {
        $(`#${identifier}`).modal('hide');
    }
}
