import Class from '../core/Class.js';

export default class Schedule {


    constructor(data) {

        this.data              = data;
        this.fitness           = -1;
        this.classNumb         = 0;
        this.practicalClassNumb= 0;
        this.isFitnessChanged  = true;
        this.numberOfConflicts = 0;
        this.classes           = new Array();
        this.practicalClasses  = new Array();
    }

    initialize() {
        // initialize classes array
        this.data.getDepartments().forEach(dept => {
            dept.getCourses().forEach(course =>{
                let newClass = new Class(this.classNumb++, dept, course);
                newClass.setMeetingTime(this.data.getMeetingTimes()[Math.floor(Math.random() * this.data.getMeetingTimes().length)]);
                newClass.setRoom(this.data.getRooms()[Math.floor(Math.random() * this.data.getRooms().length)]);
                newClass.setInstructor(course.getInstructors()[Math.floor(Math.random() * course.getInstructors().length)]);
                this.classes.push(newClass);
            });
        });
        
        
        // initialize practicalClasses array
        this.data.getDepartments().forEach(dept => {
            dept.getPracticalCourses().forEach(practicalCourse => {
                practicalCourse.getCategories().forEach(category => {
                    let newPracticalClass = new practicalClass(this.practicalClassNumb++, dept, practicalCourse);
                    newPracticalClass.setMeetingTime(this.data.getPracticalMeetingTimes()[Math.floor(Math.random() * this.data.getPracticalMeetingTimes().length)]);
                    newPracticalClass.setLibrary(this.data.getLibraries()[Math.floor(Math.random() * this.data.getLibraries().length)]);
                    newPracticalClass.setAssistant(practicalCourse.getAssistantes()[Math.floor(Math.random() * practicalCourse.getAssistantes().length)]);
                    newPracticalClass.setCategory(category);
                    this.practicalClasses.push(newPracticalClass);
                });
            });
        });
        
        return this;
    }

    getData() {
        return this.data;
    }

    getNumberOfConflicts() {
        return this.numberOfConflicts;
    }

    getClasses() {
        return this.classes;
    }

    
    getPracticalClasses() {
        return this.practicalClasses;
    }
    

    getFitness() {
        if(this.isFitnessChanged == true) {
            this.fitness = this.calculateFitness();
            this.isFitnessChanged = false;
        }
        return this.fitness;
    }

    calculateFitness() {

       this.numberOfConflicts = 0;

       this.classes.forEach(x => {
            if(x.getRoom().getSeatingCapacity() < x.getCourse().getMaxNumOfStudents())
            {
                this.numberOfConflicts++;
            } 
            this.classes.filter( y => this.classes.indexOf(y) >= this.classes.indexOf(x)).forEach(y => {
                if(x.getMeetingTime() == y.getMeetingTime() && x.getID() != y.getID())
                {
                    
                    if(x.getCourse().getYear() == y.getCourse().getYear())
                    {
                        this.numberOfConflicts++;
                    }
                    if((x.getDept().getName() == "All" && (x.getCourse().getYear() == 4 || x.getCourse().getYear() == 5)) && (y.getDept().getName() == "Network" || y.getDept().getName() == "Software"))
                    {
                        this.numberOfConflicts++;
                    }
                    if(x.getRoom() == y.getRoom())
                    {
                        this.numberOfConflicts++;
                    } 
                    if(x.getInstructor() == y.getInstructor())
                    {
                        this.numberOfConflicts++;
                    } 
    
                }
            }); 
        }); 
        
        
        this.practicalClasses.forEach(x => {
            
            if(x.getLibrary().getSeatingCapacity() < x.getPracticalCourse().getMaxNumbOfStudents())
            {
                this.numberOfConflicts++;
            }
            
            this.practicalClasses.filter( y => this.practicalClasses.indexOf(y) >= this.practicalClasses.indexOf(x)).forEach(y => {
                if(x.getMeetingTime() == y.getMeetingTime() && x.getID() != y.getID())
                {
                    
                    if((x.getPracticalCourse().getYear() == y.getPracticalCourse().getYear()) && x.getCategory() == y.getCategory())
                    {
                        this.numberOfConflicts++;
                    }
                    
                    if(x.getLibrary() == y.getLibrary())
                    {
                       
                        this.numberOfConflicts++;
                    }
                    
                    if(x.getAssistant() == y.getAssistant())
                    {
                        this.numberOfConflicts++;
                    }    
                }
            });
        });
        
        return 1/(this.numberOfConflicts + 1);
 
    }

}
