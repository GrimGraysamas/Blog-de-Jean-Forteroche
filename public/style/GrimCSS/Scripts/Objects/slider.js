class Slider {
    constructor(slides, prev, next) {
        this.currentSlide = 0;
        this.slides = document.getElementsByClassName(slides);
        this.nbrSlides = this.slides.length;
        this.prevButton = document.getElementById(prev);
        this.nextButton = document.getElementById(next);
        this.event();
    }

    event() {
        let that = this;
        this.prevButton.addEventListener("click", function() {
            that.setPreviousSlide();
        })
        this.nextButton.addEventListener("click", function() {
            that.setNextSlide();
        })
    }

    setActiveSlide(newSlide) {
        this.slides[this.currentSlide].classList.remove("active");
        if (newSlide < 0) {
            newSlide = this.nbrSlides -1;
        }
        if (newSlide == this.nbrSlides) {
            newSlide = 0;
        }
        this.currentSlide = newSlide;
        this.slides[newSlide].classList.add("active");
    }

    setNextSlide() {
        this.setActiveSlide(this.currentSlide+1)
    }

    setPreviousSlide() {
        this.setActiveSlide(this.currentSlide-1)
    }
}