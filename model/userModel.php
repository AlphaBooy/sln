<?php
/* Creates the PDO object that is used to call the database */
require_once "../utils/pdo.php";

/**
 * Creates a new user in database, the user can later connect and use connected functions
 * @param $pdo PDO Object used to connect to the database
 * @param $Mail string Email adress
 * @param $Password
 * @return bool|void
 */
function newUser($Mail, $Password) {
    $pdo = getPDO();
    try {
        $sql = "INSERT INTO utilisateur SET Mail = ?, MotDePasse = ?";

        $request = $pdo->prepare($sql);
        if ($request->execute([$Mail, $Password])) {
            return true;
        }
        return false;

    }catch(PDOException $e){
        $e -> getMessage();
    }
}

/**
 * Verify if the user provides a valid user & password that is registered in database
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $mail string Mail entered by the user that is needed to connect to the application
 * @return boolean true only if the user match the password in db
 */
function isCredentialsOK($pdo, $mail) {
    /* If no PDO is given when calling the function, use this one instead */
    $pdo = $pdo.is_null() ? getPDO() : $pdo;
    try {
        $sql = "SELECT Mail, MotDePasse FROM Compte WHERE Mail = :mail";
        $request = $pdo->prepare($sql);
        $request->execute(['mail' => $mail]);
        return $request;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}