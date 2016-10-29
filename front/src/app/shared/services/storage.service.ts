import { Injectable } from '@angular/core';
import { Session } from '../models/session';
import { SessionTransformer } from '../api/transformers/session.transformer';

@Injectable()
export class StorageService {
    private SESSION_KEY = 'auth_session';

    constructor(private sessionTransformer: SessionTransformer) {}

    public saveSession(session: Session): void {
        this.setItem(this.SESSION_KEY, session);
    }

    public getSession(): Session {
        return this.getItem(this.SESSION_KEY);
    }

    public deleteSession(): void {
        localStorage.removeItem(this.SESSION_KEY);
    }

    public setItem(key: string, value: any) {
        localStorage.setItem(key, JSON.stringify(value));
    }

    public getItem(key: string) {
        return JSON.parse(localStorage.getItem(key));
    }
}
