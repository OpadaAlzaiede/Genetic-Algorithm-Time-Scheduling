export default class Library {

    constructor(number, seatingCapacity) {
        this.number = number;
        this.seatingCapacity = seatingCapacity;
    }

    getNumber() {
        return this.number;
    }

    getSeatingCapacity() {
        return this.seatingCapacity;
    }
}