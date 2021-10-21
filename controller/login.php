<?php
/*--------------------------------------------------------------------------------------------------------------------*/
/*                                          HTML construction of the page                                             */
/*--------------------------------------------------------------------------------------------------------------------*/

session_start();

// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/login/loginView.html";
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
    if ($_GET["action"] === "connexion") connexion();
}

function connexion() {
    // If the user is already logged in and try to use the function, it'll redirect him to the home page
    if (isset($_SESSION['mail'])) header("Location: home.php");

    // Fetch data from post form
    $mail = $_POST["mail"];
    $pass = htmlspecialchars($_POST["pass"]);

    if (isCredentialsOK($mail, $pass)) {
        // Initiate the new session
        $_SESSION['mail'] = $mail;
        $_SESSION['idSession'] = session_id();
        if (isUserAdmin($mail)) {
            $_SESSION['role'] = 'admin';
        } else {
            $_SESSION['role'] = 'user';
        }
        header("Location: home.php?message=connexionSuccess");
    }
}
