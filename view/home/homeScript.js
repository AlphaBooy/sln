let newImages = document.getElementsByClassName("carou-image");
let newTitles = document.getElementsByClassName("carou-title");
let newPrices = document.getElementsByClassName("carou-price");
let recoImages = document.getElementsByClassName("carou-image");
let recoTitles = document.getElementsByClassName("carou-title");
let recoPrices = document.getElementsByClassName("carou-price");
let newTotalItems = 0, recoTotalItems = 0;
let new_slide = 0, reco_slide = 0;
let moving = true;

async function loadXMLDoc() {
    let xmlhttp = new XMLHttpRequest();
    let carrouselNewContent = "",
        carrouselNewTitles = "",
        carrouselNewPrices = "",
        carrouselRecoContent = "",
        carrouselRecoTitles = "",
        carrouselRecoPrices = "";

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                let newImages = [];
                let recoImages = [];
                let images = xmlhttp.responseXML.getElementsByTagName("IMAGE");
                for (let i = 0; i < images.length; i++) {
                    if (images[i].getElementsByTagName("tag")[0].childNodes[0].nodeValue === "NEW") {
                        newImages.push(xmlhttp.responseXML.getElementsByTagName("IMAGE").item(i));
                    } else if (images[i].getElementsByTagName("tag")[0].childNodes[0].nodeValue === "RECO") {
                        recoImages.push(xmlhttp.responseXML.getElementsByTagName("IMAGE").item(i));
                    }
                }
                for (let i = 0; i < newImages.length; i++) {
                    carrouselNewContent += "<a href='nft.php?target=" + newImages[i].getElementsByTagName("href")[0].childNodes[0].nodeValue + "' class='w-20 carou-image'>" +
                        "                       <div class='image-link-container'>" +
                        "                           <img src='../../nft/" + newImages[i].getElementsByTagName("src")[0].childNodes[0].nodeValue + "' class='image image-carroussel' alt='" + newImages[i].getElementsByTagName("alt")[0].childNodes[0].nodeValue + "'>" +
                        "                           <button class='btn btn-secondary image-carroussel-text w-50'>Details</button>" +
                        "                       </div>" +
                        "                  </a>";
                    carrouselNewTitles += "<h3 class='title text-primary w-20 my-10 carou-title'>" + newImages[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + "</h3>"
                    carrouselNewPrices += "<h3 class='text-small w-20 carou-price'>" + newImages[i].getElementsByTagName("price")[0].childNodes[0].nodeValue + " <i class='fab fa-ethereum'></i></h3>"
                }

                for (let i = 0; i < recoImages.length; i++) {
                    carrouselRecoContent += "<a href='nft.php?target=" + recoImages[i].getElementsByTagName("href")[0].childNodes[0].nodeValue + "' class='w-20 carou-image'>" +
                        "                       <div class='image-link-container'>" +
                        "                           <img src='../../nft/" + recoImages[i].getElementsByTagName("src")[0].childNodes[0].nodeValue + "' class='image image-carroussel' alt='" + recoImages[i].getElementsByTagName("alt")[0].childNodes[0].nodeValue + "'>" +
                        "                           <button class='btn btn-secondary image-carroussel-text w-50'>Details</button>" +
                        "                       </div>" +
                        "                  </a>";
                    carrouselRecoTitles += "<h3 class='title text-primary w-20 my-10 carou-title'>" + recoImages[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + "</h3>"
                    carrouselRecoPrices += "<h3 class='text-small w-20 carou-price'>" + recoImages[i].getElementsByTagName("price")[0].childNodes[0].nodeValue + " <i class='fab fa-ethereum'></i></h3>"
                }

                document.getElementById("carrousel-new-images").innerHTML = "<button class='button-carrousel btn-prev-new w-5'><i class='fas fa-angle-left'></i></button>" + carrouselNewContent + "<button class='button-carrousel btn-next-new w-5'><i class='fas fa-angle-right'></i></button>";
                document.getElementById("carrousel-new-titles").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewTitles + "<span class='w-5'>&nbsp;</span>"
                document.getElementById("carrousel-new-prices").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselNewPrices + "<span class='w-5'>&nbsp;</span>"

                document.getElementById("carrousel-reco-images").innerHTML = "<button class='button-carrousel btn-prev-reco w-5'><i class='fas fa-angle-left'></i></button>" + carrouselRecoContent + "<button class='button-carrousel btn-next-reco w-5'><i class='fas fa-angle-right'></i></button>";
                document.getElementById("carrousel-reco-titles").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselRecoTitles + "<span class='w-5'>&nbsp;</span>"
                document.getElementById("carrousel-reco-prices").innerHTML = "<span class='w-5'>&nbsp;</span>" + carrouselRecoPrices + "<span class='w-5'>&nbsp;</span>"

                newImages = document.getElementsByClassName("carou-new-image");
                newTitles = document.getElementsByClassName("carou-new-title");
                newPrices = document.getElementsByClassName("carou-new-price");

                recoImages = document.getElementsByClassName("carou-reco-image");
                recoTitles = document.getElementsByClassName("carou-reco-title");
                recoPrices = document.getElementsByClassName("carou-reco-price");

                newTotalItems = images.length;
                recoTotalItems = images.length;
            }
        }
    }

    xmlhttp.open("GET", "../view/home/data.xml", false);
    xmlhttp.send();
}

function moveNext(carou) {
    if (carou === "new" && !moving) {
        if (new_slide === (recoTotalItems - 1)) {
            new_slide = 0;
        } else {
            new_slide++;
        }
        moveNewCarouselTo(new_slide);
    } else if (carou === "reco" && !moving) {
        if (reco_slide === (recoTotalItems - 1)) {
            reco_slide = 0;
        } else {
            reco_slide++;
        }
        moveRecoCarouselTo(reco_slide);
    }
}

function movePrev() {
    if (carou === "new" && !moving) {
        if (new_slide === 0) {
            new_slide = (newTotalItems - 1);
        } else {
            new_slide--;
        }
        moveNewCarouselTo(new_slide);
    } else if (carou === "reco" && !moving) {
        if (reco_slide === 0) {
            reco_slide = (recoTotalItems - 1);
        } else {
            reco_slide--;
        }
        moveRecoCarouselTo(reco_slide);
    }
}

function disableInteraction() {
    moving = true;
    setTimeout(function(){
        moving = false
    }, 500);
}

function moveNewCarouselTo(slide) {
    if (!moving) {
        disableInteraction();
        var new_newPrevious = slide - 1,
            new_newNext = slide + 1,
            new_oldPrevious = slide - 2,
            new_oldNext = slide + 2;
        if (new_newPrevious <= 0) {
            new_oldPrevious = (recoTotalItems - 1);
        } else if (new_newNext >= (recoTotalItems - 1)){
            new_oldNext = 0;
        }
        if (slide === 0) {
            new_newPrevious = (newTotalItems - 1);
            new_oldPrevious = (newTotalItems - 2);
            new_oldNext = (slide + 1);
        } else if (slide === (newTotalItems -1)) {
            new_newPrevious = (slide - 1);
            new_newNext = 0;
            new_oldNext = 1;
        }
        newImages[new_oldPrevious].className = "w-20 carou-new-image";
        newTitles[new_oldPrevious].className = "title text-primary w-20 my-10 carou-new-title";
        newPrices[new_oldPrevious].className = "text-small w-20 carou-new-price";
        newImages[new_oldNext].className = "w-20 carou-new-image";
        newTitles[new_oldNext].className = "title text-primary w-20 my-10 carou-new-title";
        newPrices[new_oldNext].className = "text-small w-20 carou-new-price";
        newImages[new_newPrevious].className = "w-20 carou-new-image" + " prev";
        newTitles[new_newPrevious].className = "title text-primary w-20 my-10 carou-new-title" + " prev";
        newPrices[new_newPrevious].className = "text-small w-20 carou-new-price" + " prev";
        newImages[new_newNext].className = "w-20 carou-new-image" + " next";
        newTitles[new_newNext].className = "title text-primary w-20 my-10 carou-new-title" + " next";
        newPrices[new_newNext].className = "text-small w-20 carou-new-price" + " next";

        for (let i = slide; i < slide + 4; i++ ) {
            newImages[i % newTotalItems].className = "w-20 carou-new-image" + " active";
            newTitles[i % newTotalItems].className = "title text-primary w-20 my-10 carou-new-title" + " active";
            newPrices[i % newTotalItems].className = "text-small w-20 carou-new-price" + " active";
        }
    }
}

function moveRecoCarouselTo(slide) {
    if (!moving) {
        disableInteraction();
        var reco_newPrevious = slide - 1,
            reco_newNext = slide + 1,
            reco_oldPrevious = slide - 2,
            reco_oldNext = slide + 2;
        if (reco_newPrevious <= 0) {
            reco_oldPrevious = (recoTotalItems - 1);
        } else if (reco_newNext >= (recoTotalItems - 1)){
            reco_oldNext = 0;
        }
        if (slide === 0) {
            reco_newPrevious = (recoTotalItems - 1);
            reco_oldPrevious = (recoTotalItems - 2);
            reco_oldNext = (_slide + 1);
        } else if (slide === (newTotalItems -1)) {
            reco_newPrevious = (slide - 1);
            reco_newNext = 0;
            reco_oldNext = 1;
        }
        recoImages[reco_oldPrevious].className = "w-20 carou-reco-image";
        recoTitles[reco_oldPrevious].className = "title text-primary w-20 my-10 carou-reco-title";
        recoPrices[reco_oldPrevious].className = "text-small w-20 carou-reco-price";
        recoImages[reco_oldNext].className = "w-20 carou-reco-image";
        recoTitles[reco_oldNext].className = "title text-primary w-20 my-10 carou-reco-title";
        recoPrices[reco_oldNext].className = "text-small w-20 carou-reco-price";
        recoImages[reco_newPrevious].className = "w-20 carou-reco-image" + " prev";
        recoTitles[reco_newPrevious].className = "title text-primary w-20 my-10 carou-reco-title" + " prev";
        recoPrices[reco_newPrevious].className = "text-small w-20 carou-reco-price" + " prev";
        recoImages[reco_newNext].className = "w-20 carou-reco-image" + " next";
        recoTitles[reco_newNext].className = "title text-primary w-20 my-10 carou-reco-title" + " next";
        recoPrices[reco_newNext].className = "text-small w-20 carou-reco-price" + " next";

        for (let i = slide; i < slide + 4; i++ ) {
            recoImages[i % recoTotalItems].className = "w-20 carou-reco-image" + " active";
            recoTitles[i % recoTotalItems].className = "title text-primary w-20 my-10 carou-reco-title" + " active";
            recoPrices[i % recoTotalItems].className = "text-small w-20 carou-reco-price" + " active";
        }
    }
}

async function initCarousel() {
    newImages[newTotalItems - 1].classList.add("prev");
    newTitles[newTotalItems - 1].classList.add("prev");
    newPrices[newTotalItems - 1].classList.add("prev");
    recoImages[recoTotalItems - 1].classList.add("prev");
    recoTitles[recoTotalItems - 1].classList.add("prev");
    recoPrices[recoTotalItems - 1].classList.add("prev");
    for (let i = 0; i < 4; i++) {
        newImages[i].classList.add("active");
        newTitles[i].classList.add("active");
        newPrices[i].classList.add("active");
        recoImages[i].classList.add("active");
        recoTitles[i].classList.add("active");
        recoPrices[i].classList.add("active");
    }
    newImages[5].classList.add("next");
    newTitles[5].classList.add("next");
    newPrices[5].classList.add("next");
    recoImages[5].classList.add("next");
    recoTitles[5].classList.add("next");
    recoPrices[5].classList.add("next");

    let new_next = document.getElementsByClassName('btn-next-new')[0],
        new_prev = document.getElementsByClassName('btn-prev-new')[0],
        reco_next = document.getElementsByClassName('btn-next-new')[0],
        reco_prev = document.getElementsByClassName('btn-prev-new')[0];
    new_next.addEventListener('click', moveNext("new"));
    new_prev.addEventListener('click', movePrev("new"));
    reco_next.addEventListener('click', moveNext("reco"));
    reco_prev.addEventListener('click', movePrev("reco"));

    moving = false;

}

loadXMLDoc().then(r => initCarousel());