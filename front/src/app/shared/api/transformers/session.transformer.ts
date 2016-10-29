import { ITransformer } from './interface.transformer';
import { Session } from '../../models/session';

export class SessionTransformer implements ITransformer {
    transform(data: any): Session {
        if (data) {
            let user = data.user || {};

            return new Session(user.id, data.token, user.email, user.roles);
        }

        return null;
    }
}
