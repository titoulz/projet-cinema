<?php
$password = "Testeur46!";
//$hash = "$2y$10$9AaYn8DqptSbXBGXELWOD.6ULHxUFfWCIJlLWExevEQhssq29Cp8i";
$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}