export default class Class {

    constructor(id, dept, course) {
        this.id     = id;
        this.dept   = dept;
        this.course = course;
    }

    setInstructor(instructor) {
        this.instructor = instructor;
    }

    setMeetingTime(meetingTime) {
        this.meetingTime = meetingTime;
    }

    setRoom(room) {
        this.room = room;
    }

    getID() {
        return this.id;
    }

    getDept() {
        return this.dept;
    }

    getCourse() {
        return this.course;
    }

    getInstructor() {
        return this.instructor;
    }

    getMeetingTime() {
        return this.meetingTime;
    }

    getRoom() {
        return this.room;
    }
}



/*
Class.prototype.setInstructor  = function(instructor){ this.instructor = instructor};
Class.prototype.setMeetingTime = function(meetingTime){ this.meetingTime = meetingTime};
Class.prototype.setRoom        = function(room){ this.room = room};

Class.prototype.getID          = function(){ return this.id; };
Class.prototype.getDept        = function(){ return this.dept; };
Class.prototype.getCourse      = function(){ return this.course; };
Class.prototype.getInstructor  = function(){ return this.instructor; };
Class.prototype.getMeetingTime = function(){ return this.meetingTime; };
Class.prototype.getRoom        = function(){ return this.room; };
*/