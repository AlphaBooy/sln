<?php

function getEuroValue($idCrypto) {
    $pdo = getPDO();
    try {
        $sql = "SELECT Euro FROM CryptoMonnaie WHERE id = :id;";
        $request = $pdo->prepare($sql);
        $request->execute(['id' => $idCrypto]);
        $result = $request->fetch();
        return $result;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}

function getDollarValue($idCrypto) {
    $pdo = getPDO();
    try {
        $sql = "SELECT Dollar FROM CryptoMonnaie WHERE id = :id;";
        $request = $pdo->prepare($sql);
        $request->execute(['id' => $idCrypto]);
        $result = $request->fetch();
        return $result;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}