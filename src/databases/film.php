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
    if (idExists($id) == false){
        header('Location: ../index.php' );
    }
    $connexion=getConnexion();
    $sql = "SELECT * FROM films WHERE id = :id";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':id', $id);
    $requetePDO->execute();
    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}

//conversion de la date en français
function dateToFrench($date){
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}
//verif si l'id existe
function idExists($id){
    $connexion=getConnexion();
    $sql = "SELECT * FROM films WHERE id = :id";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':id', $id);
    $requetePDO->execute();
    return $requetePDO->fetch(PDO::FETCH_ASSOC);
}
//minutes en heures
function minutesToHours($minutes){
    $heures = floor($minutes / 60);
    $minutes = ($minutes % 60);
    return $heures.'h'.$minutes;
}