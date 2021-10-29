<?php if (!isset($typeAccount) || $typeAccount === "other") { ?>
    <div class="little-centered-container">
        <h1 class="text-centered">NO ACCOUNT</h1>
    </div>
<?php } else { ?>
    <div class="little-centered-container">
        <div class="w-50">
            <img src="../view/profile/profilePics/defaultProfilePic.jpg" class="profile-pic my-50" alt="profile picture">
        </div>
        <div class="w-50">
            <h1><?=$compte["PseudonymeProprietaire"];?></h1>
            <h2><?=$_SESSION["mail"];?></h2>
        </div>
        <div class="w-100"></div>
    </div>
<?php
}

var_dump($nft);