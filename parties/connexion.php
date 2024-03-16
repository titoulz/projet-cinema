
<?php
//connexion à la base de données
require_once "../assets/config/db-config.php";
//déclaration des variables
$email = '';
$mdp = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //récupération des données
    if (isset($_POST['mdp']) && isset($_POST['email'])) {
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        //verifier si le hash est correct
        $sql="SELECT * FROM user WHERE email = :email";
        $requetePDO=$connexion->prepare($sql);
        $requetePDO->bindParam(':email', $email);
        $requetePDO->execute();
        $user = $requetePDO->fetch(PDO::FETCH_ASSOC);
        if ($user){
            if (password_verify($mdp, $user['mdp'])){
                echo "vous êtes connecté";
                //rediriger vers la page d'accueil
                header('Location: ../index.php');
            }else{
                echo "le mot de passe est incorrect";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">Projet Cinema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php/#filmlist">Liste des films </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="formulairefilm.php">ajouter un film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">se connecter (current)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="register.php">s'inscrire</a>
            </li>
        </ul>
    </div>
</nav>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>
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
</body>
</html>
