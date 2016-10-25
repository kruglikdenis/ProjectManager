import { ITransformer } from './interface.transformer.ts';
import { User } from '../../models/user';
import { Session } from '../../models/session';

export class SessionTransformer implements ITransformer {
    transform(data: any): Session {
        if (data) {
            // console.log(data)
            let user = new User(data.user.id, data.user.email, data.user.roles, data.user.password);
            let session = new Session(data.token, user);

            return session;
        }

        return null;
    }
}
