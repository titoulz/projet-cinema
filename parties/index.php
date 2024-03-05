
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
/*
////////////////////////////////////////////////////////////////
////////////////////////MAIN///////////////////////////////////
////////////////////////////////////////////////////////////////
*/


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Projet Cinema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#filmlist">Liste des films <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
        </ul>
    </div>
</nav>
<section id="filmlist">
<h1 class="text-center">Projet Cinema</h1>

<h1 class="text-center">LISTE DES FILMS</h1>

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


////////////////////////////////////////////////////////////////
////////////////////////CARDS///////////////////////////////////
////////////////////////////////////////////////////////////////
?>
<div class="row">
    <?php
    foreach ($films as $film) {
        $titre= $film['titre'];
        $image= $film['image'];
        $date= $film['date'];
        $durée= $film['durée'];
        $résumé=$film['résumé'];
        ?>
        <div class="col-md-6 col-lg-2">
            <div class="card">
                <img src="<?php echo $image?>" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold" ><?php echo  strtoupper($titre)?></h5>
                    <p class="card-text fw-bold"><?php echo $durée ?> minutes ⏱️</p>
                    <p class="card-footers fw-light">🗓️ <?php echo $date ?>🗓️</p>
                    <a href="detail_film.php?id=<?php echo $film['id']?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</section>