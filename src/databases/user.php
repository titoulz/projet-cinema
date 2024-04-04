<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";

//fichier de fonctions pour les utilisateurs
//register function
function register($pseudo, $email, $mdp){
    $connexion=getConnexion();
    $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT); // Hash the password

    echo "Hashed password: " . $mdp_hashed . "<br>";

    $sql = "INSERT INTO user (pseudo, email, mdp) VALUES ( ?, ?, ?)";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(1, $pseudo);
    $requetePDO->bindParam(2, $email);
    $requetePDO->bindParam(3, $mdp_hashed); // Store the hashed password
    $requetePDO->execute();
}
//verifier si l'email existe
function emailExists($email){
    $connexion=getConnexion();
    $sql = "SELECT * FROM user WHERE email = :email";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':email', $email);
    $requetePDO->execute();
    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}
function fetchAllUsers(){
    $connexion=getConnexion();
    $sql = "SELECT * FROM user";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->execute();
    return $requetePDO->fetchAll(PDO::FETCH_ASSOC);
}
//login function
function userExiste($email) {
    // Assuming $conn is your database connection
    $connexion=getConnexion();

    // Prepare a SELECT statement
    $sql = "SELECT * FROM user WHERE email = :email";

    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':email', $email); // Bind the :email placeholder to the $email variable
    // Execute the statement
    $requetePDO->execute();
    // Get the result
    $result = $requetePDO->fetchAll();
    // If a user was found, return the user record
    if (count($result) > 0) {
        return $result[0];
    }

    // If no user was found, return null
    return null;
}

//creer une session

function creerSession($user){
    $_SESSION['user'] = $user;
}
function deconnecter(){
    unset($_SESSION['user']);
}
