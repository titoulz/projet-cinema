<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";

//fichier de fonctions pour les utilisateurs
//register function
function register($pseudo, $email, $mdp){
    $connexion=getConnexion();
    $sql = "INSERT INTO user (pseudo, email, mdp) VALUES ( ?, ?, ?)";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(1, $pseudo);
    $requetePDO->bindParam(2, $email);
    $requetePDO->bindParam(3, $mdp);
    $requetePDO->execute();
}
//verigier si l'email existe
function emailExists($email){
    $connexion=getConnexion();
    $sql = "SELECT * FROM user WHERE email = :email";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':email', $email);
    $requetePDO->execute();
    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}
//login function
function login($email, $mdp){
    $connexion=getConnexion();
    $sql = "SELECT * FROM user WHERE email = :email";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':email', $email);
    $requetePDO->execute();
    $user = $requetePDO->fetch(PDO::FETCH_ASSOC);
    if ($user){
        if (password_verify($mdp, $user['mdp'])){
            return $user;
        }
    }
    return false;
}