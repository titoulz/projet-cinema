<?php
?>
<?php
session_start();
$_SESSION['email'] = 'test@example.com'; // Replace with a valid user ID from your database
//connexion à la base de données
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
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>
<link href="../assets/css/stylesheet.css" rel="stylesheet">

<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" id="title" maxlength="50" required>
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Avis</label>
        <textarea name="review" class="form-control" id="review" required></textarea>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Note</label>
        <input type="number" name="rating" class="form-control" id="rating" min="0" max="5" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
</form>
