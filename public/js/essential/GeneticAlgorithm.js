import Population from './Population.js';
import Driver from './Driver.js';
import Schedule from './Schedule.js';

export default class GeneticAlgorithm {

    constructor(data) {
        this.data = data;
    }

    evolve(population) {
        return this.mutatePopulation(this.crossOverPopulation(population));
    }

    crossOverPopulation(population) {
        let driver = new Driver(); // 1
        let crossOverPopulation = new Population(population.getSchedules().length, this.data); // 1
        for(let i = 0; i < driver.NUMB_OF_ELITE_SCHEDULES; i++) {  // 1
            crossOverPopulation.getSchedules()[i] = population.getSchedules()[i]; // NUMB_OF_ELITE_SCHEDULES
        }
        for(let i = driver.NUMB_OF_ELITE_SCHEDULES; i < population.getSchedules().length; i++) { // 1
            if(driver.CROSSOVER_RATE > Math.random()) { // population.getSchedules().length - NUMB_OF_ELITE_SCHEDULES
                let schedule1 = this.selectTournamentPopulation(population).sortByFitness().getSchedules()[0]; // population.getSchedules().length - NUMB_OF_ELITE_SCHEDULES
                let schedule2 = this.selectTournamentPopulation(population).sortByFitness().getSchedules()[0]; // population.getSchedules().length - NUMB_OF_ELITE_SCHEDULES
                crossOverPopulation.getSchedules()[i] = this.crossOverSchedule(schedule1, schedule2); // population.getSchedules().length - NUMB_OF_ELITE_SCHEDULES
            }else {
                crossOverPopulation.getSchedules()[i] = population.getSchedules()[i]; // population.getSchedules().length - NUMB_OF_ELITE_SCHEDULES
            }
        }
        return crossOverPopulation;
    }

    crossOverSchedule(schedule1, schedule2) {
        let crossOverSchedule = new Schedule(this.data).initialize(); // 1
        for(let i = 0; i < crossOverSchedule.getClasses().length; i++) {
            if(Math.random() > 0.5) crossOverSchedule.getClasses()[i] = schedule1.getClasses()[i];
            else crossOverSchedule.getClasses()[i] = schedule2.getClasses()[i]; 
        }
        
        for(let i = 0; i < crossOverSchedule.getPracticalClasses().length; i++) {
            if(Math.random() > 0.5) crossOverSchedule.getPracticalClasses()[i] = schedule1.getPracticalClasses()[i];
            else crossOverSchedule.getPracticalClasses()[i] = schedule2.getPracticalClasses()[i]; 
        }
        
        return crossOverSchedule;
    }

    mutatePopulation(population) {
        let driver = new Driver();
        let mutatePopulation = new Population(population.getSchedules.length, this.data);
        let schedules = mutatePopulation.getSchedules();
        for(let i = 0; i < driver.NUMB_OF_ELITE_SCHEDULES; i++) {
            schedules[i] = population.getSchedules()[i];
        }
        for(let i = driver.NUMB_OF_ELITE_SCHEDULES; i < population.getSchedules().length; i++) {
            schedules[i] = this.mutateSchedule(population.getSchedules()[i]);
        }

        return mutatePopulation;
    }

    mutateSchedule(mutateSchedule) {
        let driver = new Driver();
        let schedule = new Schedule(this.data).initialize();
        for(let i = 0; i < mutateSchedule.getClasses().length; i++) {
            if(driver.MUTATION_RATE > Math.random()) mutateSchedule.getClasses()[i] = schedule.getClasses()[i];

        }
        
        for(let i = 0; i < mutateSchedule.getPracticalClasses().length; i++) {
            if(driver.MUTATION_RATE > Math.random())
            mutateSchedule.getPracticalClasses()[i] = schedule.getPracticalClasses()[i];
        }
        
        return mutateSchedule;
    } 

    selectTournamentPopulation(population) {
        let driver = new Driver();
        let tournamentPopulation = new Population(driver.TOURNAMENT_SELECTION_SIZE, this.data);
        for(let i = 0; i < driver.TOURNAMENT_SELECTION_SIZE; i++) {
            tournamentPopulation.getSchedules()[i] = population.getSchedules()
            [Math.floor(Math.random() * population.getSchedules().length)];
        }
        return tournamentPopulation;
    }
}
