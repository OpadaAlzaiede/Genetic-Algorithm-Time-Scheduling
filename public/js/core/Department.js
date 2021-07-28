export default class Department {

    constructor(name, number) {
        this.name    = name;
        this.number = number;
        this.courses = [];
        this.practicalCourses = [];
    }

    addCourse(course) {
        this.courses.push(course);
    }

    addPracticalCourse(practicalCourse) {
        this.practicalCourses.push(practicalCourse);
    }
    
    getName() {
        return this.name;
    }

    getCourses() {
        return this.courses;
    }

    getPracticalCourses() {
        return this.practicalCourses;
    }

    getNumber() {
        return this.number;
    }
}

/*
Department.prototype.getName    = function(){ return this.name; };
Department.prototype.getCourses = function(){ return this.courses; };
*/