<?php

session_start();

require_once "../model/userModel.php";
$categorie=getCategorie();
$crypto=getCrypto();
$creator=getCreator();
$owner=getOwner();
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
var_dump($_FILES['file']['name']);
if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["owner"]) && !empty($_POST["crypto"]) && !empty($_POST["creator"]) && !empty($_POST["categorie"]) && !empty($_POST["price"]) && !empty($_POST["Cible"]) && !empty($_FILES['file']['name'])){
	AddNft($_POST["name"],$_POST["description"],$_POST["owner"],$_POST["crypto"],$_POST["creator"],$_POST["categorie"],$_POST["price"],$_POST["Cible"],$_FILES['file']['name']);
	
	$image = $_POST['file'];
	$imagename = $_FILES['file']['name'];
	$imagetype = $_FILES['file']['type'];
	$imageerror = $_FILES['file']['error'];
	$imagetemp = $_FILES['file']['tmp_name'];
	$imagePath = "../nft/";
	
	if(is_uploaded_file($imagetemp)) {
		if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
			var_dump("Image enregistré avec succès.");
		}
		else {
			var_dump("Erreur pour déplacer l'image.");
		}
	}
	else {
		var_dump("Erreur pour enregistrer les images.");
	}
}else{
	var_dump("non");
}
