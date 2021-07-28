export default class Instructor {

    constructor(id, name) {
        this.id   = id;
        this.name = name;
    }

    getID() {
        return this.id;
    }

    getName() {
        return this.name;
    }

    toString() {
        return this.name;
    }
}


/*
Instructor.prototype.getID    = function(){ return this.id; };
Instructor.prototype.getName  = function(){ return this.name; };
Instructor.prototype.toString = function(){ return this.name; };
*/