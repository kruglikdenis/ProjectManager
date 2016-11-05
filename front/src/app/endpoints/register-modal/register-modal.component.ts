import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { AuthUser } from '../../shared/models/auth-user';
import { UserService } from '../../shared/services/user.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';
import { emailValidator } from '../../shared/validators/email.validator';
import { areEqualValidator } from '../../shared/validators/equal.validator';

@Component({
    selector: 'pm-register-modal',
    templateUrl: './register-modal.component.html',
    styleUrls: ['./register-modal.component.scss'],
})
export class RegisterModalComponent implements OnInit {
    id: string = 'registerModal'

    registerForm: FormGroup;

    isLoading: boolean;

    formErrors: Object;
    validationMessages: Object;

    constructor(
        private userService: UserService,
        private modalService: ModalService,
        private router: Router,
        private builder: FormBuilder
    ) {
        this.isLoading = false;

        this.formErrors = {
            email: '',
            password: '',
            repeatPassword: ''
        };

        this.validationMessages = {
            email: {
                required: 'Email is required.',
                incorrectMailFormat: 'Incorrect email format.'
            },
            password: {
                required: 'Password is required.',
                minlength: 'Length should be greater than 6 characters.'
            },
            repeatPassword: {
                required: 'Repeat password is required.',
                areEqual: 'Passwords should be equal.'
            }
        };
    }

    register() {
        let user = new AuthUser(this.registerForm.value.email, this.registerForm.value.password);

        this.userService.register(user);
    }

    ngOnInit(): void {
        this.buildForm();
    }

    buildForm(): void {
        this.registerForm = this.builder.group({
            email:  ['', [Validators.required, emailValidator()]],
            password: ['', [Validators.required, Validators.minLength(6)]],
            repeatPassword: ['', [Validators.required, areEqualValidator('password')]],
        });

        this.registerForm.valueChanges.subscribe(data => this.onValueChanged(data));
        this.onValueChanged();
    }

    onValueChanged(data?: any) {
        const form = this.registerForm;

        for (const field in this.formErrors) {
            // clear previous error message (if any)
            this.formErrors[field] = '';
            const control = form.get(field);
            if (control && control.dirty && !control.valid) {
                const messages = this.validationMessages[field];
                for (const key in control.errors) {
                    this.formErrors[field] += messages[key] + ' ';
                }
            }
        }
    }
}
