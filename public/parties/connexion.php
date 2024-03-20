
<?php
//connexion à la base de données
require_once "../../src/config/db-config.php";
?>
<header><?php
require_once "header.php"; ?></header>
<?php
require_once "../../src/databases/user.php";
//déclaration des variables
$email = '';
$mdp = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //récupération des données
    if (isset($_POST['mdp']) && isset($_POST['email'])) {
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        //function login
         if (login($email, $mdp)){
            echo "vous êtes connecté";
            header('Location: ../index.php');
        }else{
            echo "le mot de passe est incorrect";
        }
    }
}
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
    <input type="mdp"
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
