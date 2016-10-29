import { Component, Input } from '@angular/core';
import { User } from '../../shared/models/user';

@Component({
    selector: 'pm-user-card',
    templateUrl: './user-card.component.html',
    styleUrls: ['./user-card.component.scss']
})
export class UserCardComponent {
    @Input() user: User;
}
