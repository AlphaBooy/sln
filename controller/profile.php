<?php

session_start();

require_once "../model/userModel.php";

$mail = $_SESSION['mail'];

$compte = accountCreator($mail);
if ($compte == null) {
    $compte = accountProprietaire($mail);
    if($compte != null) {
        $typeAccount = "owner";
        $nfts = NftByOwner($compte["id_proprietaire"]);
    } else {
        $typeAccount = "other";
    }
} else {
    $nfts = NftByCreator(compte["id_createur"]);
    $typeAccount = "creator";
}

// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
require_once "../utils/message.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/profile/profileView.php";
?><style><?php
require_once "../view/profile/profileStyle.css";
?></style><?php
// Include the footer part of the HTML document (closing brackets mainly)
require_once "../utils/footer.php";

