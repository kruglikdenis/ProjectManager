import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { AuthUser } from '../../shared/models/auth-user';
import { FormErrors } from '../../shared/models/form-errors';
import { UserService } from '../../shared/services/user.service';
import { AuthService } from '../../shared/services/auth.service';
import { ModalService } from '../../shared/services/modal.service';
import { Router } from '@angular/router';
import { emailValidator } from '../../shared/validation/validators/email.validator';
import { areEqualValidator } from '../../shared/validation/validators/equal.validator';
import { ValueChanged } from '../../shared/validation/core/ValueChanged';

@Component({
    selector: 'pm-register-modal',
    templateUrl: './register-modal.component.html',
    styleUrls: ['./register-modal.component.scss'],
})
export class RegisterModalComponent extends ValueChanged implements OnInit {
    id: string = 'registerModal';

    registerForm: FormGroup;

    isLoading: boolean;

    formErrors: FormErrors;

    constructor(
        private userService: UserService,
        private authSrvice: AuthService,
        private modalService: ModalService,
        private router: Router,
        private builder: FormBuilder
    ) {
        super();
        this.isLoading = false;

        this.formErrors = new FormErrors();
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

    openLoginModal() {
        this.modalService.close(this.id);

        this.modalService.open('loginModal');
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

        this.registerForm.valueChanges.subscribe(data => {
                this.formErrors = this.onValueChanged(this.registerForm, this.formErrors, data);
            }
        );
    }
}
