<?php
/*--------------------------------------------------------------------------------------------------------------------*/
/*                                          HTML construction of the page                                             */
/*--------------------------------------------------------------------------------------------------------------------*/

session_start();

// If the user is already logged, redirect him to the home page
if (isset($_SESSION['mail'])) header("Location: home.php");

// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/register/registerView.html";
?><style><?php
require_once "../view/register/registerStyle.css";
?></style><?php
// Include the footer part of the HTML document (closing brackets mainly)
require_once "../utils/footer.php";

/*--------------------------------------------------------------------------------------------------------------------*/
/*                                          User interaction + model calls                                            */
/*--------------------------------------------------------------------------------------------------------------------*/

require_once "../model/userModel.php";

// Router part of the document, redirect the user depending on the "action" parameter
if (isset($_GET) && isset($_GET['action'])) {
    if ($_GET["action"] === "inscription") inscription();
}

function inscription() {
    // Fetch data from post form
    $mail = $_POST["mail"];
    $pass = htmlspecialchars($_POST["pass"]);
    $passconf = htmlspecialchars($_POST["passconf"]);

    // Regex verification of the mail format
    $formatMail = '[a-zA-Z0-9._%+-]+@+*+.+*';
    if (!preg_match( $formatMail, $mail)) {
        $error = ["mail" => "Invalid format"];
    }

    // Check if the password verification is valid
    if ($pass == $passconf) {
        // Creates a new user
        newUser($mail, $pass);
        header("Location: login.php?action=registrationOK");
    } else {
        // The password confirmation is invalid
        $error = ["passconf" => "Password field does not correspond to Password confirmation"];
    }
}