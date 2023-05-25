<?php

include 'header.php';

?>


<?php 
 if (isset($_SESSION['id'])) {
	 echo $_SESSION['id'];
 } else {
	 echo "Prijava je uspjela!";
 }
?>
	
	<br><br><br>
	<?php
	
	$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if (strpos($url,'error=empty') !==false){
		echo "Postoji prazno obvezno  polje!";
	}
	elseif (strpos($url,'error=email') !==false){
		echo "Email već postoji u bazi nije ga moguće ponovno koristiti prilikom registracije!";
	}
	
	if (isset($_SESSION['id'])) {
	 echo "Već si registriran!";
	} else {
	 echo "<form action='includes/singup.inc.php' method='POST'>
		<input type='text' name='Ime' placeholder='Ime'>
		</br></br>
		<input type='text' name='Prezime' placeholder='Prezime'>
		</br></br>
		<input type='text' name='Adresa' placeholder='Adresa'>
		</br></br>
		<input type='text' name='Grad' placeholder='Grad'>
		</br></br>
		<input type='text' name='Email' placeholder='Email'>
		</br></br>
		<input type='password' name='Lozinka' placeholder='Lozinka'>
		</br></br>

			<button type='submit'> Registriraj se</button>
		</form>";
	}
	?>
	



</br></br>

<form action="includes/logout.inc.php">
	<button>ODJAVA</button>
</form>



</body>
</html>
