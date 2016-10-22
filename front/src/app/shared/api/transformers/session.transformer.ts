import { ITransformer } from './interface.transformer.ts';
import { User } from '../../models/user';
import { Session } from '../../models/session';

export class SessionTransformer implements ITransformer {
    transform(data: any): Session {
        let user = new User(data.user.id, data.user.email);
        let session = new Session(data.token, user);

        return session;
    }
}