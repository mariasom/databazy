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
<h1>Vratenie hry</h1>
</div>
<div class="login-inside">
<?php
date_default_timezone_set("Europe/Bratislava");
//$cas = date("Y-m-d H:i:s");
$cas = "0000-00-00 00:00:00";
$sql="UPDATE spol_hry SET obsadenost='voľná', pouziv='0', datum='$cas' WHERE hryID='$_GET[hryID]' "; 

$vysledok = mysqli_query($sqlcon,$sql); 
if ($vysledok){
	echo "<h3>Hra bola úspešne vrátená.</h3>";
	header("Location: profile.php");
}
else {
	echo "<h3>Hru sa nepodarilo vrátiť.</h3>";
	echo "<button onclick=\"location.href='profile.php'\">Späť</button>";
}
?>
</div>
</div>
</body>
</html>
