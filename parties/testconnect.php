<?php
//verifier les infos de connexion
//connexion à la base de données
require_once "../assets/config/db-config.php";
//récupération des données
$email = $_POST['email'];
$mdp = $_POST['mdp'];
//verifier si le hash est correct
$sql="SELECT * FROM user WHERE email = :email";
$requetePDO=$connexion->prepare($sql);
$requetePDO->bindParam(':email', $email);
//verifier si l'email est bien présente dans la base de données
//si oui, on récupère le mot de passe
//si non, on affiche un message d'erreur
//si le mot de passe est correct, on connecte l'utilisateur
//si le mot de passe est incorrect, on affiche un message d'erreur

$requetePDO->execute();
$user = $requetePDO->fetch(PDO::FETCH_ASSOC);
if ($user){
    if (password_verify($mdp, $user['mdp'])){
        echo "vous êtes connecté";
    }else{
        echo "le mot de passe est incorrect";
    }}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.html</title>
</head>
<body>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script src="../assets/js/bootstrap.min.js"></script>
<form>
    <div class="mb-3">
        <label for="exampleemail" class="form-label">email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre email">
    </div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label
    ">mdp</label>
    <input type="mdp" class="form-control" id="exampleInputPassword1" placeholder="votre mot de passe">
</div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>