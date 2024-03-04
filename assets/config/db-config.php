<?php
//connexion à la base de données
const DB_HOST = "localhost:3306";
const DB_NAME = "db_cinema";
const DB_USER= "root";
const DB_PASSWORD="";

$connexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
echo "Connexion à la base de données réussie".PHP_EOL;
