import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { AuthUser } from '../../shared/models/auth-user';
import { UserService } from '../../shared/services/user.service';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';
import { emailValidator } from '../../shared/validation/validators/email.validator';
import { areEqualValidator } from '../../shared/validation/validators/equal.validator';
import { validationMessages } from '../../shared/validation/messages/validator.messages';

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
        private authSrvice: AuthService,
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
    }

    register() {
        this.isLoading = true;
        let user = new AuthUser(this.registerForm.value.email, this.registerForm.value.password);

        this.userService.register(user)
            .then(() => this.authSrvice.login(user))
            .then(() => {
                this.isLoading = false;

                this.modalService.close(this.id);
            })
            .catch(error => {
                this.isLoading = false;

                let body = error.json();
                this.formErrors.email = body.email;
            });
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
                const messages = validationMessages[field];
                for (const key in control.errors) {
                    this.formErrors[field] += messages[key] + ' ';
                }
            }
        }
    }
}
