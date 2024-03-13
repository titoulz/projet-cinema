<?php
echo(PHP_EOL);
//1.connexion a la DB
require_once "../assets/config/db-config.php";
//2. Récupérer les données
$email='';
$mdp='';
$pseudo='';
$mdpconfirm='';
//récupération des données du formulaire utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $mdpconfirm = isset($_POST['mdpconfirm']) ? $_POST['mdpconfirm'] : null;
}
//3. Valider les données:
$erreurs = [];
if (empty($pseudo)){
    $erreurs['pseudo'] = "le pseudo est obligatoire";
}
if (empty($mdp)){
    $erreurs['mdp'] = "le mot de passe est obligatoire";
}
if (empty($email)){
    $erreurs['email'] = "l'email est obligatoire";
}
if (empty($mdpconfirm)){
    $erreurs['mdpconfirm'] = "la confirmation du mot de passe est obligatoire";
}
if ($mdp != $mdpconfirm){
    $erreurs['mdpconfirm'] = "les mots de passe ne correspondent pas";
} else {
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
}

//4. Traiter les données

//verifier si l'email existe et refuser l'inscription si c'est le cas
//verifier si les mots de passe correspondent
//si tout est ok, on inscrit l'utilisateur
//verifier si l'email existe

    $sql = "SELECT * FROM user WHERE email = :email";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(':email', $email);
    $requetePDO->execute();
    $user = $requetePDO->fetch(PDO::FETCH_ASSOC);
    if ($user){
        $erreurs['email'] = "cet email est déjà utilisé";

    }else{
        if (empty($erreurs)){
            //requête SQL
            $sql = "INSERT INTO user (pseudo, email, mdp) VALUES (:pseudo, :email, :mdp)";
            //exécution de la requête
            $requetePDO=$connexion->prepare($sql);
            $requetePDO->bindParam(':pseudo', $pseudo);
            $requetePDO->bindParam(':mdp', $mdp);
            $requetePDO->bindParam(':email', $email);
            $requetePDO->execute();
        echo PHP_EOL."l'inscription a été effectuée avec succès";
    }
}

//redirection vers la page connexion si l'inscription a été effectuée avec succès

if (empty($erreurs)){
    header('Location: connexion.php');
}
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
                <a class="nav-link" href="../parties/formulairefilm.php">ajouter un film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../parties/connexion.php">se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../parties/register.php">s'inscrire</a>
            </li>
        </ul>
    </div>
</nav>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>

<?php
if (!empty($erreurs)){
    echo "<div class='alert alert-danger'>";
    foreach ($erreurs as $erreur){
        echo "<p>$erreur</p>";
    }
    echo "</div>";
}
?>
<form method="post">
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="mb-3">
                                            <label for="examplepseudo" class="form-label ">pseudo</label>
                                            <input
                                                    type="pseudo"
                                                    name="pseudo"
                                                    class="form-control"
                                                    id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"
                                                    placeholder="votre pseudo"
                                            value="<?= $pseudo?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleemail" class="form-label">email</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"
                                                   placeholder="votre email"
                                            value="<?= $email?>">

                                        </div>
                                </form>
                                    </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label
        ">mdp</label>
                                <input
                                        type="password"
                                        name="mdp"
                                        class="form-control"
                                        id="exampleInputPassword1"
                                        placeholder="votre mot de passe">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label
        ">mdpconfirm</label>
                                <input
                                        type="password"
                                        name="mdpconfirm"
                                        class="form-control"
                                        id="exampleInputPassword1"
                                        placeholder="confirmez votre mot de passe">
                            </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary">register</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
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

