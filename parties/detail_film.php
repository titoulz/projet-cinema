<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>
<?php
//connexion à la base de données
require_once "../assets/config/db-config.php";

//récupération de l'id du film
$id_film = $_GET['id'];

//requête SQL
$sql = "SELECT * FROM films WHERE id = :id";

//préparation de la requête
$requetePDO=$connexion->prepare($sql);
$requetePDO->bindParam(':id', $id_film);

//exécution de la requête
$requetePDO->execute();

//récupération des résultats
$film = $requetePDO->fetch(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 30rem" >
        <img src="<?php echo $film['image']?>" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo  strtoupper($film['titre'])?></h5>
            <p class="card-text"><?php echo $film['résumé'] ?></p>
            <p class="card-text"><?php echo $film['durée'] ?> minutes ⏱️</p>
            <p class="card-text">🗓️ <?php echo $film['date'] ?>🗓️</p>
            <a href="index.php" class="btn btn-primary">Retour</a>
        </div>
    </div>
</div>

</body>
</html>