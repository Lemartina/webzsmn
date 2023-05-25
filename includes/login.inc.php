<?php
session_start();
include '../dbh.php';

$Email = $_POST['Email'];
$Lozinka = $_POST['Lozinka'];


$sql = "select * from registracija where Lozinka = '$Lozinka'";
$result = $conn->query($sql);
$row = $result-> fetch_assoc();
$hash_lozinka = $row['Lozinka'];
$hash = password_verify($Lozinka,$hash_lozinka);


if($hash == 0){
	header("Location: ../naslovnica.php?error=empty");
	exit();	
} else {


	$sql = "select *from registracija where Email='$Email' and Lozinka='$hash_lozinka' ";
	$result = $conn->query($sql);

	if (!$row = $result-> fetch_assoc()) {
		
		echo "Koriničko ime ili lozinka su neispravni!";
	} else {
		$_SESSION['id']=$row['id'];
	}

	header('Location: ../naslovnica.php');
	}

?>
