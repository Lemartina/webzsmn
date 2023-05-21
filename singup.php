<?php

include 'dbh.php';

$Ime = $_POST['Ime'];
$Prezime = $_POST['Prezime'];
$Adresa = $_POST['Adresa'];
$Grad = $_POST['Grad'];
$Email = $_POST['Email'];
$Lozinka = $_POST['Lozinka'];



$sql = "insert into korisnici (Ime, Prezime, Adresa, Grad, Email, Lozinka)
 values ('$Ime','$Prezime', '$Adresa', '$Grad', '$Email', '$Lozinka')";
$result = $conn->query($sql);

header('Location: naslovnica.html');


?>
