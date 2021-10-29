<?php

session_start();

require_once "../utils/input.php";
require_once "../model/userModel.php";
require_once "../model/nft.php";
require_once "../model/crypto.php";
require_once "../model/createur.php";

$nft = targetNFT($_GET['target']);

// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
require_once "../utils/message.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/nft/nftView.php";
?><style><?php
    require_once "../view/nft/nftStyle.css";
?></style><?php
// Include the footer part of the HTML document (closing brackets mainly)
require_once "../utils/footer.php";