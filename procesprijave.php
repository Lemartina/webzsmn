<?php


if (empty($_POST["name"])) {
    die('Potrebno je unijeti ime');
}

if ( ! filter_var($_POST ['email'], FILTER_VALIDATE_EMAIL)) {
    die ('Email je potrebno unijeti u ispravnom formatu');
}

if (strlen($_POST['password']) < 8)
{
    die ('Lozinka ne smije biti kraća od 8 znakova');
}

if ( ! preg_match('/[a-z]/i', $_POST['password']))
{
    die (' Lozinka mora sadržavati najmanje jedno slovo');
}



if ( ! preg_match('/[0-9]/i', $_POST['password']))
{
    die (' Lozinka mora sadržavati najmanje jedan broj');
}


#if ( $_POST['password'] !== $_POST['password_confirmation'])
#{
 #   die (' Lozinke se moraju podudarati');
#}


$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . '/bazapodataka.php';


$sql = " INSERT INTO  user ( name, email, password_hash)
VALUES (?, ?, ?)";

$stmt = $mysqli ->stmt_init();

if ( ! $stmt->prepare ($sql)){
    die ('SQL error: '. $mysqli);
}


print_r($_POST);
var_dump(password_hash);