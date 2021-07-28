export default class Assistant {

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
