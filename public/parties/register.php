<?php
echo(PHP_EOL);
//1.connexion a la DB
require_once "../../src/config/db-config.php";
require_once "header.php";
require_once "../../src/databases/user.php";
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
$mdpErrors = [];

if (strlen($mdp) < 8) {
    $mdpErrors[] = "Le mot de passe doit comporter au moins 8 caractères";
}
if (!preg_match('/[A-Z]/', $mdp)) {
    $mdpErrors[] = "Le mot de passe doit contenir au moins une lettre majuscule";
}
if (!preg_match('/[a-z]/', $mdp)) {
    $mdpErrors[] = "Le mot de passe doit contenir au moins une lettre minuscule";
}
if (!preg_match('/[0-9]/', $mdp)) {
    $mdpErrors[] = "Le mot de passe doit contenir au moins un chiffre";
}
if (!preg_match('/[\W]/', $mdp)) {
    $mdpErrors[] = "Le mot de passe doit contenir au moins un caractère spécial";
}

if (!empty($mdpErrors)) {
    $erreurs['mdp'] = $mdpErrors;
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

$userExists = emailExists($email);
if ($userExists){
    $erreurs['email'] = "cet email est déjà utilisé";
} else {
    if (empty($erreurs)){
        register($pseudo, $email, $mdp);
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

<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>
<?php
if (!empty($erreurs)){
echo "<div class='container-sm d-flex justify-content-center'>";
    echo "<div class='alert alert-danger w-50 p-3'>";
        foreach ($erreurs as $erreur){
        if (is_array($erreur)) {
        foreach ($erreur as $err) {
        echo "<p class='mb-0'>$err</p>";
        }
        } else {
        echo "<p class='mb-0'>$erreur</p>";
        }
        }
        echo "</div>";
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

