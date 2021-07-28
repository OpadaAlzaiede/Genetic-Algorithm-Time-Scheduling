export default class Room {

    constructor(number, seatingCapacity) {
        this.number      = number;
        this.seatingtCapacity = seatingCapacity;
    }

    getNumber() {
        return this.number;
    }
    
    getSeatingCapacity() {
        return this.seatingtCapacity;
    }
}


// USING PROTOTYPE
/*
Room.prototype.getNumber          = function(){ return this.number; };
Room.prototype.getSeatingCapacity = function(){ return this.seatingtCapacity; }
*/