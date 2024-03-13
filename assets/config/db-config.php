<?php
//connexion à la base de données
const DB_HOST = "localhost:3306";
const DB_NAME = "db_cinema";
const DB_USER= "root";
const DB_PASSWORD="";

try {
    $connexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
