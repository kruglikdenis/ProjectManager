export const validationMessages: { [key: string]: any } = {
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
