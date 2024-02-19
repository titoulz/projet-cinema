<?php
//connexion à la base de données
const DB_HOST = "localhost:3306";
const DB_NAME = "db_film";
const DB_USER= "root";
const DB_PASSWORD="";

$connexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
//affichage d'un message si la connexion est réussie centrer dans la page
echo "<h1 class='text-center'>🌐🌐Connexion à la base de données réussie🌐🌐</h1>";
