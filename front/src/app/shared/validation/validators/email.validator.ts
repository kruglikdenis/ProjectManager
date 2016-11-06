import { ValidatorFn, AbstractControl } from '@angular/forms';

export function emailValidator(): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} => {
        const email = control.value;
        const regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (email !== '' && (email.length <= 5 || !regexp.test(email))) {
            return {
                incorrectMailFormat: true
            };
        }

        return null;
    };
}
