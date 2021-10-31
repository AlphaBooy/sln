let images = document.getElementsByClassName("carou-image");
let titles = document.getElementsByClassName("carou-title");
let prices = document.getElementsByClassName("carou-price");
let totalItems = 0;
let slide = 0;
let moving = true;

async function loadXMLDoc() {
    let xmlhttp = new XMLHttpRequest();
    let carrouselNewContent = "",
        carrouselNewTitles = "",
        carrouselNewPrices = "";

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                images = xmlhttp.responseXML.getElementsByTagName("IMAGE");
                for (let i = 0; i < images.length; i++) {
                    carrouselNewContent += "<a href='nft.php?target=" + images[i].getElementsByTagName("href")[0].childNodes[0].nodeValue + "' class='w-20 carou-image'>" +
                        "                       <div class='image-link-container'>" +
                        "                           <img src='../../nft/" + images[i].getElementsByTagName("src")[0].childNodes[0].nodeValue + "' class='image image-carroussel' alt='" + images[i].getElementsByTagName("alt")[0].childNodes[0].nodeValue + "'>" +
                        "                           <button class='btn btn-secondary image-carroussel-text w-50'>Details</button>" +
                        "                       </div>" +
                        "                  </a>";
                    carrouselNewTitles += "<h3 class='title text-primary w-20 my-10 carou-title'>" + images[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + "</h3>"
                    carrouselNewPrices += "<h3 class='text-small w-20 carou-price'>" + images[i].getElementsByTagName("price")[0].childNodes[0].nodeValue + " <i class='fab fa-ethereum'></i></h3>"
                }
                document.getElementById("carrousel-new-images").innerHTML = "<button class='button-carrousel btn-prev w-5'><i class='fas fa-angle-left'></i></button>" + carrouselNewContent + "<button class='button-carrousel btn-next w-5'><i class='fas fa-angle-right'></i></button>";
                document.getElementById("carrousel-new-titles").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewTitles + "<span class='w-5'>&nbsp;</span>"
                document.getElementById("carrousel-new-prices").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewPrices + "<span class='w-5'>&nbsp;</span>"

                document.getElementById("carrousel-reco-images").innerHTML = "<button class='button-carrousel btn-prev w-5'><i class='fas fa-angle-left'></i></button>" + carrouselNewContent + "<button class='button-carrousel btn-next w-5'><i class='fas fa-angle-right'></i></button>";
                document.getElementById("carrousel-reco-titles").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewTitles + "<span class='w-5'>&nbsp;</span>"
                document.getElementById("carrousel-reco-prices").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewPrices + "<span class='w-5'>&nbsp;</span>"

                images = document.getElementsByClassName("carou-image");
                titles = document.getElementsByClassName("carou-title");
                prices = document.getElementsByClassName("carou-price");
                totalItems = images.length;
            }
        }
    };

    xmlhttp.open("GET", "../view/home/data.xml", false);
    xmlhttp.send();
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

async function initCarousel() {
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

    let next = document.getElementsByClassName('btn-next')[0],
        prev = document.getElementsByClassName('btn-prev')[0];
    next.addEventListener('click', moveNext);
    prev.addEventListener('click', movePrev);

    moving = false;

}

loadXMLDoc().then(r => initCarousel());