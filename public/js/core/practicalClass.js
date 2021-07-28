export default class practicalClass {

    constructor(id, dept, practicalCourse) {
        this.id = id;
        this.dept = dept;
        this.practicalCourse = practicalCourse;
    }

    setAssistant(assistant) {
        this.assistant = assistant;
    }

    setMeetingTime(meetingTime) {
        this.meetingTime = meetingTime;
    }

    setLibrary(library) {
        this.library = library;
    }

    setCategory(category) {
        this.category = category;
    }

    getID() {
        return this.id;
    }

    getDept() {
        return this.dept;
    }

    getPracticalCourse() {
        return this.practicalCourse
    }

    getAssistant() {
        return this.assistant;
    }

    getMeetingTime() {
        return this.meetingTime;
    }

    getLibrary() {
        return this.library;
    }

    getCategory() {
        return this.category;
    }

    toString() {
        return "["+ this.dept.getName()+","+ this.practicalCourse.getName()+","+ this.library.getNumber()+
                ","+ this.assistant.getId()+","+ this.meetingTime.getId() +"," + this.category.getNumber()+"]";
    }
}