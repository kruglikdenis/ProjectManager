import { ITransformer } from './interface.transformer';
import { Project } from '../../models/project';

export class ProjectListTransformer implements ITransformer {
    transform(data: any): Array<Project> {
        if (data) {
            return data.map(item => new Project(item));
        }

        return null;
    }
}
