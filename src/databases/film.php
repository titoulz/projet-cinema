<?php
//connexion à la base de données
require_once __DIR__."/../config/db-config.php";
//fichier de fonctions pour les films
function getFilms(){
    $connexion=getConnexion();
    $sql = "SELECT * FROM films";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->execute();
    return $requetePDO->fetchAll(PDO::FETCH_ASSOC);
}
function addfilms($titre, $résumé, $durée, $date, $pays, $image){
    $connexion=getConnexion();
    $sql = "INSERT INTO films (titre, résumé, durée, date, pays, image) VALUES (?, ?, ?, ?, ?, ?)";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(1, $titre);
    $requetePDO->bindParam(2, $résumé);
    $requetePDO->bindParam(3, $durée);
    $requetePDO->bindParam(4, $date);
    $requetePDO->bindParam(5, $pays);
    $requetePDO->bindParam(6, $image);
    $requetePDO->execute();
}
function getFilmById($id){
    $connexion=getConnexion();
    $sql = "SELECT * FROM films WHERE id = :id";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':id', $id);
    $requetePDO->execute();
    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}

