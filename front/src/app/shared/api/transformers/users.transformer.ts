import { ITransformer } from './interface.transformer';
import { User } from '../../models/user';

export class UsersTransformer implements ITransformer {
    transform(data: any): Array<User> {
        if (data) {
            let users = Array<User>();

            for (let item of data) {
                let user = new User (item.id,
                    item.email,
                    item.roles,
                    item.password,
                    item.first_name || '',
                    item.last_name || '',
                    item.middle_name || '',
                    item.phone || '',
                    item.city || '',
                    item.birthday || '');

                users.push(user);
            }

            return users;
        }

        return null;
    }
}
