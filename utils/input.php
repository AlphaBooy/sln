<?php

require_once '../model/CryptoModel.php';

function convertDate($date) {
    $dateFormat = explode('-', $date);
    return $dateFormat[2].'/'.$dateFormat[1].'/'.$dateFormat[0];
}

function getLogoCrypto($idCrypto) {
    switch ($idCrypto) {
        case 1:
            // Ether
            return "<i class='fab fa-ethereum'></i>";
            break;
        case 2:
            // DOGE
            return "<i class='fas fa-paw'></i>";
    }
}

function toEuro($price, $idCrypto) {
    return $price * getEuroValue($idCrypto)["Euro"];
}

function toDollar($price, $idCrypto) {
    return $price * getDollarValue($idCrypto)["Dollar"];
}