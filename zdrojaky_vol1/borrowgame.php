<?php
include ('connect.php');
session_start()
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="bookstyle1.css">
	<title></title>
</head>
<body>
<div class="login">
<div class="header">
<h1>Požičanie knihy</h1>
</div>
<div class="login-inside">
<?php
date_default_timezone_set("Europe/Bratislava");
$cas = date("Y-m-d H:i:s");

$sql="UPDATE spol_hry  SET obsadenost='požičaná', pouziv='$_SESSION[id]', datum='$cas' WHERE hryID='$_GET[hryID]' "; 

$vysledok = mysqli_query($sqlcon,$sql); 

if ($vysledok){
	echo "<h3>Hra bola úspešne požičaná.</h3>";
	header("Location: hry.php");
}
else {
	echo "<h3>Hru sa nepodarilo požičať.</h3>";
	echo "<button onclick=\"location.href='hry.php'\">Späť</button>";
}
?>
</div>
</div>
</body>
</html>
