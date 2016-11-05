import { ValidatorFn, AbstractControl } from '@angular/forms';

export function areEqualValidator(fieldKey: string): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} => {
        let right = control.root.get(fieldKey);
        if (right) {
            if (control.value !== right.value) {
                return {
                    areEqual: false
                };
            }
        }

        return null;
    };
}
