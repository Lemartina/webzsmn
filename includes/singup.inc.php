<?php
session_start();

include '../dbh.php';

$Ime = $_POST['Ime'];
$Prezime = $_POST['Prezime'];
$Adresa = $_POST['Adresa'];
$Grad = $_POST['Grad'];
$Email = $_POST['Email'];
$Lozinka = $_POST['Lozinka'];


if (empty($Ime)){
	header("Location: ../singup.php?error=empty");
	exit();
}

if (empty($Prezime)){
	header("Location: ../singup.php?error=empty");
	exit();
}
if (empty($Adresa)){
	header("Location: ../singup.php?error=empty");
	exit();
}
if (empty($Grad)){
	header("Location: ../singup.php?error=empty");
	exit();
}
if (empty($Email)){
	header("Location: ../singup.php?error=empty");
	exit();
}
if (empty($Lozinka)){
	header("Location: ../singup.php?error=empty");
	exit();
}

 else{
	$sql="select Email from registracija where Email='$Email'";
	$result = $conn->query($sql);
	$emailcheck =mysqli_num_rows($result);
	if ($emailcheck>0){
		header("Location: ../singup.php?error=email");
		exit();
		} else {
			
			$encrypted_password = password_hash($Lozinka, PASSWORD_DEFAULT);
			
			$sql = "insert into registracija (Ime, Prezime, Adresa, Grad, Email, Lozinka)
			values ('$Ime','$Prezime', '$Adresa', '$Grad', '$Email', '$encrypted_password')";
			$result = $conn->query($sql);

			header("Location: ../naslovnica.php");
		}
	 }
 

?>
