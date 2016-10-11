import { Injectable } from '@angular/core';
import { Session } from '../models/session';

@Injectable()
export class StorageService {
    private SESSION_KEY = 'auth_session';

    public saveSession(session: Session): void {
        this.setItem(this.SESSION_KEY, JSON.stringify(session));
    }

    public getSession(): Session {
        return this.getItem(this.SESSION_KEY);
    }

    public setItem(key: string, value:any) {
        localStorage.setItem(key, JSON.stringify(value));
    }

    public getItem(key: string) {
        let data = localStorage.getItem(key);
        if (data) {
            return JSON.parse(data);
        }
        
        return null;
    }
}
