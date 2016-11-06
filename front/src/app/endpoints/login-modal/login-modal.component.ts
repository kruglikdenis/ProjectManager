import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { AuthUser } from '../../shared/models/auth-user';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';
import { emailValidator } from '../../shared/validation/validators/email.validator';
import { validationMessages } from '../../shared/validation/messages/validator.messages';

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
            .catch(error => {
                this.isLoading = false;

                let body = error.json();
                this.formErrors.email = this.formErrors.password = body.message;
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
                const messages = validationMessages[field];
                for (const key in control.errors) {
                    this.formErrors[field] += messages[key] + ' ';
                }
            }
        }
    }
}
