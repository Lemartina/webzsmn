<?php


if (empty($_POST["name"])) {
    die('Potrebno je unijeti ime');
}

if ( ! filter_var($_POST ['email'], FILTER_VALIDATE_EMAIL)) {
    die ('Email je potrebno unijeti u ispravnom formatu');
}

if (strlen($_POST['password']) < 8){
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


$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . '/bazapodataka.php';


$sql = "INSERT INTO user(name, email, password_hash)
VALUES (?, ?, ?)";

$stmt = $mysqli ->stmt_init();

if ( ! $stmt->prepare($sql)){
    die ("SQL error: " . $mysqli->error);


}


$stmt->bind_param("sss",
                    $_POST["name"],
                    $_POST["email"],
                    $password_hash);


$stmt->execute();

echo "prijavljen/a si";





<!DOCTYPE html>
<html>
<head>
<meta charset='UFT-8'>
<title> </title>
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='style.css'>
<script src='javabar.js'></script>





	
</head>
<body onload='startTime()''>

<div id='txt' class='clockStyle'></div>


<header> 
	<div class='wrapper'>
		<a href='zs.html'>
		<img src='zebra.jpg'  alt='zebra logo'>
		</a>
		

	
		<nav>
			<ul>
			<li><a href="index.html">Početna</a></li>
			<li><a href="zs.html">Zebrini snovi</a></li>
			<li><a href="ml.html">Životopis</a></li>
			<li><a href="knt.html">Kontakt</a></li>
			<li><a href="ank.html">Anketa</a></li>
			<li><a href="obrazacprijave.html">Prijava</a></li>
			</ul>
		</nav>
	</div>
</header>
	
	<div class="opis-box">
	</div>

	<div class="index-intro"> 
		<div class="wrapper">
			
       
           </form>
		</div>
	</div>
</section>

<footer>
	<div class="wrapper">
		<nav>
			<ul>
			<li><a href="index.html">Početna</a></li>
			<li><a href="zs.html">Zebrini snovi</a></li>
			<li><a href="ml.html">Životopis</a></li>
			<li><a href="knt.html">Kontakt</a></li>
			<li><a href="ank.html">Anketa</a></li>
			</ul>
		</nav>
	</div>
</footer>
</body>
</html>
