import Schedule from './Schedule.js';

export default class Population {

    constructor(size, data) {
        this.schedules = [];
        for(let i = 0; i < size; i++)
        {
            this.schedules.push(new Schedule(data).initialize());
        }
    }

    getSchedules() {
        return this.schedules;
    }

    sortByFitness() {
        this.schedules.sort((schedule1, schedule2) => {
            let returnValue = 0;
            if(schedule1.getFitness() > schedule2.getFitness()) returnValue = -1;
            else if(schedule1.getFitness() < schedule2.getFitness()) returnValue = 1;
            return returnValue;
        });
       return this;
    }
}
