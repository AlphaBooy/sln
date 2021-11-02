<?php if (!isset($typeAccount) || $typeAccount === "other") { ?>
    <div class="little-centered-container">
        <h1 class="text-centered">NO ACCOUNT</h1>
    </div>
<?php } else { ?>
    <div class="little-centered-container">
        <div class="w-25">
            <img src=<?="../view/profile/profilePics/" . $compte["picture"];?> class="profile-pic my-50" alt="profile picture">
        </div>
        <div class="w-50 column">
            <h1 class="mt-50"><?=$compte["PseudonymeProprietaire"];?></h1>
            <span><?=$_SESSION["mail"];?></span>
        </div>
        <div class="w-100">
            <h2>NFT possessed : </h2>
            <?php
            if (!is_null($nfts)) {
                foreach ($nfts as $nft) {
                ?>
                    <h3><?=$nft["NomNFT"];?></h3>
                    <img src=<?="../nft/" . $nft["link"];?> class="profile_nft">
                <?php
                }
            } else {
                echo "<p>You don't have or have created any NFT yet !</p>";
            }
            ?>
        </div>
    </div>
<?php
}