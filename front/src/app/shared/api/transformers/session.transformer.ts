import { ITransformer } from './interface.transformer.ts';
import { Session } from '../../models/session';

export class SessionTransformer implements ITransformer {
    transform(data: any): any {
        let session = new Session(data.token);
        let user = data.user || {};
        session.id = user.id;
        session.email = user.email;
        session.roles = user.roles || [];

        return session;
    }
}
