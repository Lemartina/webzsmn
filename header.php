<?php

session_start();

?>

<html>
<head>
<meta charset="UTF-8">
<title>Prijava</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li><a href="naslovnica.php">POČETNA</a></li>
			<?php
			
			if (isset($_SESSION['id'])) {
				 echo "<form action='includes/logout.inc.php'>
				<button>ODJAVA</button>
				</form>";
			} else {
				echo"<form action='includes/login.inc.php' method='POST'>
				<input type='text' name='Email' placeholder='Email'>
				<input type='password' name='Lozinka' placeholder='Lozinka'>
				<button type='submit'> Prijavi se</button>
				</form>";
			}
			
			
			?>
			<li><a href="singup.php">REGISTRIRAJ SE</a></li>
		</ul>
	
	</nav>

</header>