<div class="centered-container">
    <span class="w-100">
        <h1 class="text-centered"><?=$nft["NomNFT"];?></h1>
    </span>
    <div class="inline-flex w-100">
        <div class="image-display column w-75">
            <img src=<?="../../nft/" . $nft["link"];?> class="image" alt="monkey">
        </div>
        <div class="image-information column w-25 mx-10">
            <div class="w-100">
                <h2 class="text-centered"><?=$nft["PseudonymeCreateur"];?></h2>
                <div class="description">
                    <p class="mx-10 text-justify"><?=$nft["Description"];?></p>
                </div>
                <p class="text-light mx-10"><i class="far fa-calendar-alt"></i> &nbsp; <?=convertDate($nft["DateCréation"]);?></p>
                <span class="ml-10"><?=number_format($nft["Prix"],0,','," ");?> <?=$nft["NomCrypto"];?> <?=getLogoCrypto($nft["id_Crypto"]);?></span>
                <span class="ml-10 text-small"><?=number_format(toEuro($nft["Prix"], $nft["id_Crypto"]),0,','," ");?> EUR <i class="fas fa-euro-sign"></i></span>
                <span class="ml-10 text-small"><?=number_format(toDollar($nft["Prix"], $nft["id_Crypto"]),0,','," ");?> USD <i class="fas fa-dollar-sign"></i></span>
                <br/>
                <div class="mx-10 my-25"><span><i class="fas fa-hashtag"></i></span> <?=$nft["NomCategorie"];?></div>
                <span class="inline-flex space-evenly w-100 my-10">
                    <a href="" class="text-primary"><i class="far fa-2x fa-star"></i></a>
                    <a href="" class="share"><i class="fas fa-2x fa-share-alt"></i></a>
                    <a href=<?=$nft["Insta"];?> class="insta"><i class="fab fa-2x fa-instagram"></i></a>
                    <a href=<?=$nft["Twitter"];?> class="twitter"><i class="fab fa-2x fa-twitter"></i></a>
                </span>
                <button class="btn-primary w-100">Buy it !</button>
            </div>
        </div>
    </div>
</div>