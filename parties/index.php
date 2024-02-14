
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<body>
//bootstrap stylesheet and js files
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>

<h1>Projet Cinema</h1>

<h1>LISTE DES FILMS</h1>

</body>
</html>
<?php
//connexion à la base de données
require_once "../assets/config/db-config.php";
//requête SQL
$sql = "SELECT * FROM films";

//exécution de la requête
$requetePDO=$connexion->prepare($sql);
$requetePDO->execute();
//récupération des résultats
$films = $requetePDO->fetchAll(PDO::FETCH_ASSOC);
//affichage des résultats
foreach ($films as $film) {

}
?>

<?php
foreach ($films as $film) {
    $titre= $film['titre'];
    $image= $film['image'];
    $date= $film['date'];
    $genre= $film['genre'];
    $duree= $film['durée'];
    $résumé=$film['résumé'];
}
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card">
            <img src="<?php $image?> class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php $titre?>/h5>
                <p class="card-text"><?php $résumé ?></p>
                    <p class="card-footers"> <?php $date ?></p>
            </div>
        </div>
    </div>
</div>


