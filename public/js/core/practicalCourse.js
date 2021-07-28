export default class practicalCourse {

    constructor(number, name, assitantes, maxNumbOfStudents, year, categories) {
        this.number = number;
        this.name = name;
        this.assitantes = assitantes;
        this.maxNumbOfStudents = maxNumbOfStudents;
        this.year = year;
        this.categories = categories;
    }

    getNumber() {
        return this.number;
    }

    getName() {
        return this.name;
    }

    getAssistantes() {
        return this.assitantes;
    }

    getMaxNumbOfStudents() {
        return this.maxNumbOfStudents;
    }

    getYear() {
        return this.year;
    }

    getCategories() {
        return this.categories;
    }

    toString() {
        return this.name;
    }
}