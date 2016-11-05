import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { AuthUser } from '../../shared/models/auth-user';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';
import { emailValidator } from '../../shared/validators/email.validator';

@Component({
    selector: 'pm-login-modal',
    templateUrl: './login-modal.component.html',
    styleUrls: ['./login-modal.component.scss'],
})
export class LoginModalComponent implements OnInit {
    id: string = 'loginModal'

    loginForm: FormGroup;

    isLoading: boolean;

    formErrors: Object;
    validationMessages: Object;

    constructor(
        private authService: AuthService,
        private modalService: ModalService,
        private router: Router,
        private builder: FormBuilder
    ) {
        this.isLoading = false;

        this.formErrors = {
            email: '',
            password: ''
        };

        this.validationMessages = {
            email: {
                required: 'Email is required.',
                incorrectMailFormat: 'Incorrect email format.'
            },
            password: {
                required: 'Password is required.'
            }
        }
    }

    ngOnInit(): void {
        this.buildForm();
    }

    login() {
        this.isLoading = true;

        const user = new AuthUser(this.loginForm.value.email, this.loginForm.value.password);

        this.authService.login(user)
            .then(() => {
                this.isLoading = false;
                this.modalService.close(this.id);
            })
            .catch(() => {
                this.isLoading = false;

                this.formErrors.email = this.formErrors.password = 'Incorrenct email or password.';
            })
        ;
    }

    openRegisterModal() {
        this.modalService.close(this.id);

        this.modalService.open('registerModal');
    }

    buildForm(): void {
        this.loginForm = this.builder.group({
            'email':  ['', [Validators.required, emailValidator()]],
            'password': ['', [Validators.required]]
        });

        this.loginForm.valueChanges.subscribe(data => this.onValueChanged(data));
        this.onValueChanged();
    }

    onValueChanged(data?: any) {
        const form = this.loginForm;

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
