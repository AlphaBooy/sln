<?php

function getPDO() {
    $host = 'mysql-sln.alwaysdata.net';
    $db = 'sln_database';
    $user = 'sln';
    $pass = 'sympaslesNFT';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}