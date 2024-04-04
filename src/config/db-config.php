<?php
//connexion à la base de données
const DB_HOST = "localhost:3306";
const DB_NAME = "db_cinema";
const DB_USER= "root"; // replace with your MySQL username
const DB_PASSWORD=""; // replace with your MySQL password

function getConnexion(): PDO{
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USER, DB_PASSWORD
    );
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

