<?php
session_start();
//connexion à la base de données
require_once "../../src/config/db-config.php";
?>

<header><?php
require_once "header.php"; ?></header>

<?php
require_once "../../src/databases/user.php";

$logins=fetchAllUsers();
//2. Récupérer les données
$email='';
$mdp='';
//récupération des données du formulaire utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;
}
//3. Valider les données:
$erreurs = [];
if (empty($email)){
    $erreurs['email'] = "l'email est obligatoire";
}
if (empty($mdp)){
    $erreurs['mdp'] = "le mot de passe est obligatoire";
}

// Comparer l'email formulaire avec l'email bdd pour pouvoir trouver le mdp bdd (relier a l'email bdd)
// comparer l'email bdd avec l'email formulaire
// comparer a l'aide de la fonction password_verify le mdp bdd avec le mdp formulaire

if (empty($erreurs)){
    $_SESSION=[
        'email' => $email,
        'mdp' => $mdp
    ];
    echo $_SESSION["email"];
    echo $_SESSION["mdp"];
    header('Location: ../index.php' );
}
//regarder si le tableau $user est vide et aller chercher les données de l'utilisateur
//$user = userExiste();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/assets/js/bootstrap.min.js"></script>
    <link href="../assets/css/stylesheet.css" rel="stylesheet">
</head>

<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../public/assets/js/bootstrap.min.js"></script>
<div class="col-md-6 offset-md-3">

    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']); // remove the message after displaying it
    }

    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // remove the message after displaying it
    }
    ?>

    <form method="POST">
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
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">mdp</label>
    <input type="password"
           name="mdp"
           class="form-control"
           id="exampleInputPassword1"
           placeholder="votre mot de passe">
</div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
