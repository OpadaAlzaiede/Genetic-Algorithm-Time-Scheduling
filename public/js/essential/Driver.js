import Data from './Data.js';

export default class Driver {

     POPULATION_SIZE = 9;
     MUTATION_RATE = 0.1;
     CROSSOVER_RATE = 0.9;
     TOURNAMENT_SELECTION_SIZE = 3;
     NUMB_OF_ELITE_SCHEDULES = 1;
     scheduleNumb = 0;
     classNumb = 0;
     data;

     getPopulationSize() {
          return this.POPULATION_SIZE;
     }

     getMutationRate() {
          return this.MUTATION_RATE;
     }

     getCrossOverRate() {
          return this.CROSSOVER_RATE;
     }

     getTournamentSelectionSize() {
          return this.TOURNAMENT_SELECTION_SIZE;
     }

     getNumbOfEliteSchedules() {
          return this.NUMB_OF_ELITE_SCHEDULES;
     }    
}







