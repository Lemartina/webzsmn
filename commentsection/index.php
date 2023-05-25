<?php

date_default_timezone_set('Europe/Zagreb');
include 'dbh.inc.php';
include 'comments.inc.php';
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<iframe src= "https://www.youtube.com/watch?v=V4hTLja7jU8" frameborder="0" allowfullscreen></iframe>

<?php

echo"<form method='POST' action='".setComments($conn)."'>

<input type='hidden' name='uid' value='Anonymus'>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
<textarea name='message'></textarea><br>
<button type='submit' name='commentSubmit' >Komentiraj</button>
</form>";

getComments($conn);
?>


</body>
</html>