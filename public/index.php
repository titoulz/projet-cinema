
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<body>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<script src="public/assets/js/bootstrap.min.js"></script>


<section id="filmlist">
<h1 class="text-center">LISTE DES FILMS</h1>

</body>
</html>
<?php
//connexion à la base de données
require_once "../src/config/db-config.php";
require_once "../src/databases/film.php";
require_once '../base.php';
require_once BASE_PROJET .'/src/config/db-config.php';
require_once "parties/header.php";
$films=getFilms();
?>

////////////////////////////////////////////////////////////////
////////////////////////CARDS///////////////////////////////////
////////////////////////////////////////////////////////////////
?>
<h1 class="text-center zzz"> LISTE DES FILMS</h1>
<div class="row">
    <?php
    foreach ($films as $film) {
        $titre= $film['titre'];
        $image= $film['image'];
        $date= $film['date'];
        $durée= $film['durée'];
        $résumé=$film['résumé'];
        ?>
        <div class="col-sm-6 col-md-3 col-lg-2 mb-3">
            <div class="card" >
                <img src="<?php echo $image?>" class="card-img-top img-fluid" alt="..." height="300" width="400">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold" ><?php echo  strtoupper($titre)?></h5>
                    <p class="card-text fw-bold">  ⏱️<?php echo $durée ?>minutes</p>
                    <p class="card-footers fw-light">🗓️ <?php echo $date ?></p>
                    <a href="parties/detail_film.php?id=<?php echo $film['id']?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <link href="assets/css/stylesheet.css" rel="stylesheet">

</div>
</section>