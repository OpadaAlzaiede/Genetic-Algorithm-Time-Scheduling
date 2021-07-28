export default class Course {

    constructor(number, name, year, semester, section) {
        this.number           = number;
        this.name             = name;
        this.year             = year;
        this.semester  = semester;
        this.section = section;
        this.instructors = [];
    }

    addInstructor(instructor) {
        this.instructors.push(instructor);
    }

    getNumber() {
        return this.number;
    }

    getName() {
        return this.name;
    }

    getInstructors() {
        return this.instructors;
    }

    getMaxNumOfStudents() {
        return this.maxNumOfStudents;
    }

    getYear() {
        return this.year;
    }
    
    getSemester() {
        return this.semester;
    }

    getSection() {
        return this.section;
    }
    
    toString() {
        return this.name;
    }
}


/*
Course.prototype.getNumber = function(){ return this.number; };
Course.prototype.getName = function(){ return this.name; };
Course.prototype.getInstructors = function(){ return this.instructors; };
Course.prototype.getMaxNumOfStudents = function(){ return this.maxNumOfStudents; };
Course.prototype.getYear = function(){ return this.year; };
Course.prototype.toString = function(){ return this.name; };
*/