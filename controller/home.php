<?php

session_start();

// Include the top of the HTML file (header + html brackets...)
require_once "../utils/header.php";
// Include a navigation bar that allow the user to navigate through the site
require_once "../utils/navbar.php";
require_once "../utils/message.php";
// Include the HTML + CSS part of the HOME page
require_once "../view/home/homeView.html";
?><style><?php
    require_once "../view/home/homeStyle.css";
?></style>
<script><?php
require_once "../view/home/homeScript.js";
?></script><?php
// Include the footer part of the HTML document (closing brackets mainly)
require_once "../utils/footer.php";
require_once "../model/userModel.php";
require_once "../model/nft.php";
require_once "../model/crypto.php";
require_once "../model/createur.php";


$nftAll = allNFT();
$tabCrypto=[];
$tabNft=[];
$tabCreateur=[];

foreach($nftAll as $obj){
	$nft=new NFT($obj["NomNFT"],$obj["Pseudonyme"],$obj["Crypto"],$obj["DateCréation"],$obj["NomCatégorie"],$obj["Prix"]);
	$tabNft[]=$nft;
	$crypto=new Crypto($obj["NomCrypto"],$obj["Euro"],$obj["Dollar"]);
	if (in_array($crypto, $tabCrypto, FALSE)){
		$tabCrypto[]=$crypto;
	}
	$createur=new Createur($obj["PseudonymeCreateur"],$obj["Twitter"],$obj["Insta"]);
	if (in_array($createur, $tabCreateur, FALSE)){
		$tabCreateur[]=$createur;
	}
}

function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
	
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
