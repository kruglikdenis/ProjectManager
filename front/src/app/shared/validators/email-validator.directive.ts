import { ValidatorFn, AbstractControl } from '@angular/forms';

export function emailValidator(): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} => {
        const email = control.value;
        const regexp = /^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i;

        if (email != "" && (email.length <= 5 || !regexp.test(email))) {
            return { "incorrectMailFormat": true };
        }

        return null;
    };
}
