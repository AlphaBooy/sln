<?php

require_once "../model/userModel.php";
// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
require_once "../utils/message.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/addNft/addNftView.html";
?><style><?php
require_once "../view/addNft/addNftStyle.css";
?></style><?php
// Include the footer part of the HTML document (closing brackets mainly)
require_once "../utils/footer.php";

var_dump($_POST);
var_dump($_FILES);
