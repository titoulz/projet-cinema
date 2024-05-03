<?php
?>
<?php
session_start();
$_SESSION['email'] = 'test@example.com'; // Replace with a valid user ID from your database
//connexion à la base de données
require_once "header.php";
require_once "../../src/config/db-config.php";
require_once "../../src/databases/comment.php"; // Assuming the addComment function is in this file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $review = isset($_POST['review']) ? $_POST['review'] : null;
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    if (!empty($title) && !empty($review) && !is_null($rating)){
        // Check if the user is logged in
        if (isset($_SESSION['email'])) {
            // Get the userId from the session
            $userId = $_SESSION['email'];
            $movieId = $_GET['id']; // Assuming the movieId is passed as a GET parameter
            addComment($userId, $movieId, $title, $review, $rating);
            echo "Votre commentaire a été ajouté avec succès.";
            header('Location: detail_film.php?id=' . $movieId);
            exit();
        } else {
            echo "Veuillez vous connecter pour ajouter un commentaire.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>

<body>
<h1 class="justify-content-center text-center" style="color: white;">AJOUTER UN COMMENTAIRE  </h1>

<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>
<link href="../assets/css/stylesheet.css" rel="stylesheet">
<div class="d-flex justify-content-center">
    <a href="../parties/detail_film.php?id=<?php echo $film['id']?>" class="btn btn-primary ">Retour au detail</a>
</div>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form method="POST" style="width: 50%;">
        <div class="mb-3">
            <label for="title" class="form-label" style="color: white;">Titre</label>
            <input type="text" name="title" class="form-control" id="title" maxlength="50" required>
        </div>
        <div class="mb-3">
            <label for="review" class="form-label" style="color: white;">Avis</label>
            <textarea name="review" class="form-control" id="review" required></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label" style="color: white;">Note</label>
            <input type="number" name="rating" class="form-control" id="rating" min="0" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
    </form>
</div>

</body>
