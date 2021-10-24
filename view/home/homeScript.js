var images = document.getElementsByClassName("carou-image"),
    titles = document.getElementsByClassName("carou-title"),
    prices = document.getElementsByClassName("carou-price"),
    totalItems = images.length,
    slide = 0,
    moving = true;

function setInitialClasses() {
    images[totalItems - 1].classList.add("prev");
    titles[totalItems - 1].classList.add("prev");
    prices[totalItems - 1].classList.add("prev");
    for (let i = 0; i < 4; i++) {
        images[i].classList.add("active");
        titles[i].classList.add("active");
        prices[i].classList.add("active");
    }
    images[5].classList.add("next");
    titles[5].classList.add("next");
    prices[5].classList.add("next");
}

function setEventListeners() {
    var next = document.getElementsByClassName('btn-next')[0],
        prev = document.getElementsByClassName('btn-prev')[0];
    next.addEventListener('click', moveNext);
    prev.addEventListener('click', movePrev);
}

function moveNext() {
    if (!moving) {
        if (slide === (totalItems - 1)) {
            slide = 0;
        } else {
            slide++;
        }
        moveCarouselTo(slide);
    }
}

function movePrev() {
    if (!moving) {
        if (slide === 0) {
            slide = (totalItems - 1);
        } else {
            slide--;
        }
        moveCarouselTo(slide);
    }
}

function disableInteraction() {
    moving = true;
    setTimeout(function(){
        moving = false
    }, 500);
}

function moveCarouselTo(slide) {
    if(!moving) {
        disableInteraction();
        var newPrevious = slide - 1,
            newNext = slide + 1,
            oldPrevious = slide - 2,
            oldNext = slide + 2;
        if (newPrevious <= 0) {
            oldPrevious = (totalItems - 1);
        } else if (newNext >= (totalItems - 1)){
            oldNext = 0;
        }
        if (slide === 0) {
            newPrevious = (totalItems - 1);
            oldPrevious = (totalItems - 2);
            oldNext = (slide + 1);
        } else if (slide === (totalItems -1)) {
            newPrevious = (slide - 1);
            newNext = 0;
            oldNext = 1;
        }
        images[oldPrevious].className = "w-20 carou-image";
        titles[oldPrevious].className = "title text-primary w-20 my-10 carou-title";
        prices[oldPrevious].className = "text-small w-20 carou-price";
        images[oldNext].className = "w-20 carou-image";
        titles[oldNext].className = "title text-primary w-20 my-10 carou-title";
        prices[oldNext].className = "text-small w-20 carou-price";
        images[newPrevious].className = "w-20 carou-image" + " prev";
        titles[newPrevious].className = "title text-primary w-20 my-10 carou-title" + " prev";
        prices[newPrevious].className = "text-small w-20 carou-price" + " prev";
        images[newNext].className = "w-20 carou-image" + " next";
        titles[newNext].className = "title text-primary w-20 my-10 carou-title" + " next";
        prices[newNext].className = "text-small w-20 carou-price" + " next";

        for (let i = slide; i < slide + 4; i++ ) {
            images[i % totalItems].className = "w-20 carou-image" + " active";
            titles[i % totalItems].className = "title text-primary w-20 my-10 carou-title" + " active";
            prices[i % totalItems].className = "text-small w-20 carou-price" + " active";
        }
    }
}

function initCarousel() {
    setInitialClasses();
    setEventListeners();
    moving = false;
}

initCarousel();