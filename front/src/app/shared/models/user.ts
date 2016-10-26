export class User {
    id: number;
    email: string;
    password: string;
    roles: Array<string>;

    firstName: string;
    lastName: string;
    middleName: string;
    phone: string;
    city: string;
    birthday: string;


    constructor(id = 0,
                email = '',
                roles = [],
                password = '',
                firstName = '',
                lastName = '',
                middleName = '',
                phone = '',
                city = '',
                birthday = '') {
        this.id = id;
        this.email = email;
        this.password = password;
        this.roles = roles;
        this.firstName = firstName;
        this.lastName = lastName;
        this.middleName = middleName;
        this.phone = phone;
        this.city = city;
        this.birthday = birthday;
    }
}
