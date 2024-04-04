<?php
//connexion à la base de données
require_once '../../base.php';
require_once BASE_PROJET .'/src/config/db-config.php';
require_once 'header.php';

//déclaration des variables
$titre = '';
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

 require_once "../../src/databases/film.php";
    //ajout du film dans la base de données
    addfilms($titre, $résumé, $durée, $date, $pays, $image);
    header('Location: ../index.php');
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
<form method="post">
<section class="vh-100" style="background-color: black;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter un Film</p>

                                <form class="mx-1 mx-md-4" method="post">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="mb-3">
                                            <label for="examplepseudo" class="form-label ">titre</label>
                                            <input
                                                    type="text"
                                                    name="titre"
                                                    class="form-control"
                                                    id="exampleInputtitre"
                                                    aria-describedby="emailHelp"
                                                    placeholder="votre titre "
                                            value="<?= $titre?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampledurée" class="form-label">durée</label>
                                            <input type="number"
                                                   name="durée"
                                                   class="form-control"
                                                   id="exampleInputdurée"
                                                   aria-describedby="emailHelp"
                                                   placeholder="durée en minutes"
                                            value="<?= $durée?>">

                                        </div>
                                </form>
                                    </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">résumé</label>
                                <input
                                        type="text"
                                        name="résumé"
                                        class="form-control"
                                        id="exampleInputrésumé"
                                        placeholder="votre résumé">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">date-de-sortie</label>
                                <input
                                        type="date"
                                        name="date"
                                        class="form-control"
                                        id="exampleInputPassword1"
                                        placeholder="date de sortie">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">pays</label>
                                <input
                                    type="pays"
                                    name="pays"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    placeholder="pays de production">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">lien de l'image</label>
                                <input
                                    type="text"
                                    name="image"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    placeholder="lien vers votre image">
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary">ajouter le film</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="../assets/img/6222149.png"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<link href="assets/css/stylesheet.css" rel="stylesheet">