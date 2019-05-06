class Carousel{
    constructor(carouselId, elementsClass, nbActiveElements) {
        this.carousel = document.getElementById(carouselId);
        this.elements = document.getElementsByClassName(elementsClass);
        this.nbElements = nbActiveElements;
    }

    events() {}

    displayElements() {}

    setNextElement() {}
    
    setPreviousElement() {}
}