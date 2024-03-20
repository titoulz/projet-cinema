<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>

<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";
require_once "header.php";

//récupération de l'id du film
//utiliser la fonction getfilmById
$id = $_GET['id'];
require_once "../../src/databases/film.php";
$film = getfilmById($id);

//récupération des résultats

require_once "header.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $film['image']?>" class="img-fluid" style="border: 4px solid #000;" alt="...">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3"><?php echo  strtoupper($film['titre'])?></h2>
            <p><strong>Synopsys : <br></strong> <?php echo $film['résumé'] ?></p>
            <p><strong>Durée :</strong> <?php echo $film['durée'] ?> minutes ⏱️</p>
            <p><strong>Date de sortie :</strong> 🗓️ <?php echo $film['date'] ?>🗓️</p>
            <p><strong>Pays :</strong> 🌍 <?php echo $film['pays'] ?>🌍</p>
            <a href="../index.php" class="btn btn-primary mt-3">Retour</a>
        </div>
    </div>
</div>

</body>
</html>
<link href="assets/css/stylesheet.css" rel="stylesheet">