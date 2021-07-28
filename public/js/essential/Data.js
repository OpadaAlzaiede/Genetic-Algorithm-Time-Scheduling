import Room                 from '../core/Room.js';
import Library              from '../core/Library.js';
import Instructor           from '../core/Instructor.js';
import MeetingTime          from '../core/MeetingTime.js';
import Course               from '../core/Course.js';

export default class Data {

    constructor(courses, instructors, rooms, libraries, depts, meetingTimes) {
        this.courses = courses;
        this.instructors = instructors;
        this.rooms = rooms;
        this.libraries = libraries;
        this.depts = depts;
        this.meetingTimes = meetingTimes;
    }

    getRooms(){
        return this.rooms;
    }

    getLibraries() {
        return this.libraries;
    }

    getMeetingTimes() {
        return this.meetingTimes;
    }

    getPracticalMeetingTimes() {
        return this.PracticalMeetingTimes;
    }

    getInstructors() {
        return this.instructors;
    }

    
    getAssistantes() {
        return this.assistantes;
    }
    
    getCourses() {
        return this.courses;
    }

    
    getPracticalCourses() {
        return this.practicalCourses;
    }
    
    getDepartments() {
        return this.depts;
    }
}   