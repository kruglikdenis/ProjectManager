import { Injectable } from '@angular/core';
import { JQueryStatic } from '@types/jquery';

declare var $:JQueryStatic;

@Injectable()
export class ModalService {
    open(identifier: string) {
        $(`#${identifier}`).modal('show');
    }

    close(identifier: string) {
        $(`#${identifier}`).modal('hide');
    }
}
