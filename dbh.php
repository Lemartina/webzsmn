<?php
return $conn = mysqli_connect('Localhost', 'root', '', 'zebrinisnovi');

if (!$conn) {
	
	die("Connection failed: " . mysqli_connect_error());
}

?>