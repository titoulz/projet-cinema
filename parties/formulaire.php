<?php
//formulaire our ajouter un film dans la base de données

//connexion à la base de données
require_once "../assets/config/db-config.php";

//récupération des données du formulaire
$titre = $_POST['titre'];
//requête SQL
$sql = "INSERT INTO films (titre) VALUES (:titre)";
