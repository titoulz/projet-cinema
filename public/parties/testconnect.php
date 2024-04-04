<?php
$mdp = 'Testrx25!';
$mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT); // Hash the password
$mdpuser=readline("Entrez votre mot de passe: ");
if (password_verify($mdpuser, $mdp_hashed)) {
    echo "Le mot de passe est valide";
} else {
    echo "Le mot de passe est invalide";
}