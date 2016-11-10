import { FormGroup } from '@angular/forms';
import { FormErrors } from '../../models/form-errors';
import { validationMessages } from '../../validation/messages/validator.messages';

export class ValueChanged {
    onValueChanged(form: FormGroup, errors: FormErrors, data?: any): FormErrors {
        for (const field in errors) {
            if (errors.hasOwnProperty(field)) {
                // clear previous error message (if any)
                errors[field] = '';
                const control = form.get(field);
                if (control && control.dirty && !control.valid) {
                    const messages = validationMessages[field];
                    for (const key in control.errors) {
                        if (control.errors.hasOwnProperty(key)) {
                            errors[field] += messages[key] + ' ';
                        }
                    }
                }
            }
        }

        return errors;
    }
}
