<?php
//formulaire d'ajout de film par l'utilisateur
//connexion à la base de données
require_once "../assets/config/db-config.php";
$résumé = '';
$durée = '';
$date = '';
$pays = '';
$image = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //récupération des données du formulaire
    $titre = isset($_POST['titre']) ? $_POST['titre'] : null;
    $résumé = isset($_POST['résumé']) ? $_POST['résumé'] : null;
    $durée = isset($_POST['durée']) ? $_POST['durée'] : null;
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $pays = isset($_POST['pays']) ? $_POST['pays'] : null;
    $image = isset($_POST['image']) ? $_POST['image'] : null;
// Check if any field is empty
if (empty($titre)) $erreurs['titre'] = "Le titre est requis";
if (empty($résumé)) $erreurs['résumé'] = "Le résumé est requis";
if (empty($durée)) $erreurs['durée'] = "La durée est requise";
if (empty($date)) $erreurs['date'] = "La date est requise";
if (empty($pays)) $erreurs['pays'] = "Le pays est requis";
if (empty($image)) $erreurs['image'] = "L'image est requise";

// If there are no errors, execute the SQL query
if (empty($erreurs)) {
    //requête SQL
    $sql = "INSERT INTO films (titre, résumé, durée, date, pays,image) VALUES (?,?,?,?,?,?)";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(1, $titre);
    $requetePDO->bindParam(2, $résumé);
    $requetePDO->bindParam(3, $durée);
    $requetePDO->bindParam(4, $date);
    $requetePDO->bindParam(5, $pays);
    $requetePDO->bindParam(6, $image);
    $requetePDO->execute();
    echo "le film a été ajouté avec succès";
}}
//formulaire d'ajout de film par l'utilisateur
//verifier que tout les champs sont remplis avant d'envoyer les données
//si tout est ok, on envoie les données dans la base de données
//sinon on affiche un message d'erreur

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Projet Cinema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Liste des films <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../formulairefilm.php">ajouter un film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="register.php">s'inscrire</a>
            </li>
        </ul>
    </div>
</nav>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>
<h1 class="text-center">AJOUTER UN FILM</h1>
<form method="POST" novalidate ">
    <div class="mb-3">
        <label for="exampletitre" class="form-label">titre</label>
        <input type="text" name="titre" class="form-control" id="exampletitre" placeholder="votre titre"
               style="width: 500px">
    </div>
    <div class="mb-3">
        <label for="exampleresume" class="form-label">résumé</label>
        <input type="text"
               name="résumé"
               class="form-control"
               id="exampleresume"
               placeholder="résumé du film"
        value="<?= $résumé ?>"
               style="width: 500px">
    </div>
    <div class="mb-3">
        <label for="exampleduree" class="form-label">durée</label>
        <input type="number"
               name="durée"
               class="form-control"
               id="exampleduree"
               placeholder="durée du film"
        value="<?= $durée?>"
               style="width: 500px">
    </div>
    <div class="mb-3">
        <label for="exampledate" class="form-label">date de sortie</label>
        <input type="date"
               name="date"
               class="form-control"
               id="exampledate"
        value="<?= $date?>"
        style="width: 500px">
    </div>
    <div class="mb-3">
        <label for="examplepays" class="form-label">pays d'origine</label>
        <input type="text"
               name="pays"
               class="form-control"
               id="examplepays"
               placeholder="pays de production"
        value="<?= $pays?>"
               style="width: 500px">
    </div>
<div class="mb-3">
    <label for="exampleimage" class="form-label">image</label>
    <input type="text"
           name="image"
           class="form-control"
           id="exampleimage"
           placeholder="lien de l'image"
    value="<?=$image?>"
           style="width: 500px">
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>