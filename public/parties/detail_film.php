<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Film</title>
    <style>
        body {
            color: white !important;
        }
    </style>
</head>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>
<link href="../assets/css/stylesheet.css" rel="stylesheet">

<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";
require_once "header.php";
//utiliser la fonction getfilmById
$movieId = $_GET['id']; // Use this as the movieId
require_once "../../src/databases/film.php";
$film = getfilmById($movieId);
$date=$film['date'];
$date=dateToFrench($date);
//récupération des résultats
$durée = $film['durée'];
$durée= minutesToHours($durée);
require_once "header.php";
?>
<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";
require_once "../../src/databases/comment.php"; // Assuming the getCommentsByMovieId function is in this file

$movieId = $_GET['id']; // Use this as the movieId
$comments = getCommentsByMovieId($movieId); // Get the comments for this movie
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <br>
            <img src="<?php echo $film['image']?>" class="img-fluid" style="border: 4px solid #000;" alt="...">
        </div>
        <div class="col-md-6">
            <br>
            <h2 class="mb-3"><?php echo  strtoupper($film['titre'])?></h2>
            <p><strong>Durée :</strong> <?php echo $durée ?>  ⏱️</p>
            <p><strong>Date de sortie :</strong> 🗓️ <?php echo $date ?></p>
            <p><strong>Pays :</strong> 🌍 <?php echo $film['pays'] ?>🌍</p>
            <p><strong>Synopsys : <br></strong> <?php echo $film['résumé'] ?></p>

            <div class="button-container" style="display: flex; justify-content: space-between;">
                <a href="ajout-commentaire.php?id=<?php echo $film['id']?>" class="btn btn-primary">Ajouter un commentaire</a>
                <a href="../index.php" class="btn btn-primary mt-3">Retour</a>
            </div>
            <div class="container mt-5">
                <?php
                $averageRating = getAverageRatingByMovieId($movieId);
                ?>
                <?php
$commentCount = getCommentCountByMovieId($movieId);
?>
<p<p><strong>Moyenne des notes :</strong>
    <?php for($i = 0; $i < floor($averageRating); $i++): ?>
        <span class="average-star">&#9733;</span> <!-- This is the HTML entity for a star -->
    <?php endfor; ?>
    <?php if ($averageRating - floor($averageRating) >= 0.5): ?>
        <span class="average-star">&#189;</span> <!-- This is the HTML entity for a half star -->
    <?php endif; ?>
    <?php for($i = ceil($averageRating); $i < 5; $i++): ?>
        <span class="average-star">&#9734;</span> <!-- This is the HTML entity for an empty star -->
    <?php endfor; ?>
</p>><strong>Nombre de commentaires :</strong> <?php echo $commentCount; ?></p>
                <h2>Commentaires</h2>
                <?php foreach ($comments as $comment): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title"><?= htmlspecialchars($comment['title']) ?></h5>
                            <p class="card-subtitle text-muted">Posté par <?= htmlspecialchars($comment['user_id']) ?> le <?= date('d/m/Y H:i', strtotime($comment['date'])) ?></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= nl2br(htmlspecialchars($comment['review'])) ?></p>
                            <p class="card-text"><strong>Note :</strong>
                                <?php for($i = 0; $i < $comment['rating']; $i++): ?>
                                    <span class="star">&#9733;</span> <!-- This is the HTML entity for a star -->
                                <?php endfor; ?>
                                <?php for($i = $comment['rating']; $i < 5; $i++): ?>
                                    <span class="star">&#9734;</span> <!-- This is the HTML entity for an empty star -->
                                <?php endfor; ?>
                            </p>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

</body>
</html>
<link href="assets/css/stylesheet.css" rel="stylesheet">