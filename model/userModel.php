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
function isCredentialsOK($mail, $pass) {
    /* If no PDO is given when calling the function, use this one instead */
    $pdo = getPDO();
    try {
        $sql = "SELECT Mail, MotDePasse FROM Compte WHERE Mail = :mail";
        $request = $pdo->prepare($sql);
        $request->execute(['mail' => $mail]);
        $result = $request->fetch();
        return $result['MotDePasse'] === $pass;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}

function isUserAdmin($user) {
    /* If no PDO is given when calling the function, use this one instead */
    $pdo = getPDO();
    try {
        $sql = "SELECT * FROM Compte WHERE Mail = :mail";
        $request = $pdo->prepare($sql);
        $request->execute(['mail' => $mail]);
        $result = $request->fetch();
        var_dump($result);
        return $result['admin'] === 1;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}

/**
 * Takes all NFT informations
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @return all NFT
 */
function allNFT() {
	/* If no PDO is given when calling the function, use this one instead */
	$pdo = getPDO();
	try {
		$sql = "SELECT N.*, J.PseudonymeCreateur, J.Insta, J.Twitter, C.*, T.NomCategorie FROM CryptoMonnaie C, Catégorie T,  NFT N, Créateur J WHERE N.id_Crypto = C.id AND N.id_Créateur = J.id AND N.id_Catégorie=T.id;";
		$request = $pdo->prepare($sql);
		$request->execute();
		$result = $request->fetchAll();
		return $result;
		
	} catch(PDOException $e) {
		$e -> getMessage();
	}
}

/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function oneNFT($nomNFT) {
	/* If no PDO is given when calling the function, use this one instead */
	$pdo = getPDO();
	try {
		$sql = "SELECT N.*, J.PseudonymeCreateur, J.Insta, J.Twitter, C.* FROM CryptoMonnaie C, NFT N, Créateur J WHERE N.id_Crypto = C.id AND N.id_Créateur = J.id AND N.Nom LIKE :nom;";
		$request = $pdo->prepare($sql);
		$request->execute(['nom' => $nomNFT]);
		$result = $request->fetch();
        return $result;
		
	} catch(PDOException $e) {
		$e -> getMessage();
	}
}

/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function targetNFT($target) {
    /* If no PDO is given when calling the function, use this one instead */
    $pdo = getPDO();
    try {
        $sql = "SELECT N.*, J.PseudonymeCreateur, J.Insta, J.Twitter, C.*, Cat.NomCategorie FROM CryptoMonnaie C, NFT N, Créateur J, Catégorie Cat WHERE N.id_Crypto = C.id AND N.id_Créateur = J.id AND N.target = :target AND N.id_Catégorie = Cat.id;";
        $request = $pdo->prepare($sql);
        $request->execute(['target' => $target]);
        $result = $request->fetch();
        return $result;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}


/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function accountProprietaire($mail) {
	/* If no PDO is given when calling the function, use this one instead */
	$pdo = getPDO();
	try {
		$sql = "SELECT P.*, C.* FROM Compte C, Propriétaire P WHERE C.Mail = :mail AND P.id_Compte = C.id;";
		$request = $pdo->prepare($sql);
		$request->execute(['mail' => $mail]);
		$result = $request->fetch();
		return $result;
		
	} catch(PDOException $e) {
		$e -> getMessage();
	}
}


/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function accountCreator($mail) {
    /* If no PDO is given when calling the function, use this one instead */
    $pdo = getPDO();
    try {
        $sql = "SELECT P.*, C.* FROM Compte C, Créateur P WHERE C.Mail = :mail AND P.id_Compte = C.id;";
        $request = $pdo->prepare($sql);
        $request->execute(['mail' => $mail]);
        $result = $request->fetch();
        return $result;

    } catch(PDOException $e) {
        $e -> getMessage();
    }
}
/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function NftByCreator($id) {
	/* If no PDO is given when calling the function, use this one instead */
	$pdo = getPDO();
	try {
		$sql = "SELECT N.* FROM NFT N, Créateur C WHERE C.id_createur = N.id_Créateur AND C.id_createur = :id;";
		$request = $pdo->prepare($sql);
		$request->execute(['id' => $id]);
		$result = $request->fetchAll();
		return $result;
		
	} catch(PDOException $e) {
		$e -> getMessage();
	}
}

/**
 * Return one NFT by a name
 * @param $pdo PDO Object used to connect to database, if null, use the default one
 * @param $nomNFT string name of the NFT user search
 * @return one NFT
 */
function NftByOwner($id) {
	/* If no PDO is given when calling the function, use this one instead */
	$pdo = getPDO();
	try {
		$sql = "SELECT N.* FROM NFT N, Propriétaire P WHERE P.id_proprietaire = N.id_Propriétaire AND P.id_proprietaire = :id;";
		$request = $pdo->prepare($sql);
		$request->execute(['id' => $id]);
		$result = $request->fetchAll();
		return $result;
		
	} catch(PDOException $e) {
		$e -> getMessage();
	}
}
