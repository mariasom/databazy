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
<h1>Vratenie knihy</h1>
</div>
<div class="login-inside">
<?php
date_default_timezone_set("Europe/Bratislava");
//$cas = date("Y-m-d H:i:s");
$cas = "0000-00-00 00:00:00";
$sql="UPDATE knihy SET obsadenost='voľná', pouziv='0', datum='$cas' WHERE knihyID='$_GET[knihyID]' "; 

$vysledok = mysqli_query($sqlcon,$sql); 
if ($vysledok){
	echo "<h3>Kniha úspešne vrátená.</h3>";
	header("Location: profile.php");
}
else {
	echo "<h3>Knihu sa nepodarilo vrátiť.</h3>";
	echo "<button onclick=\"location.href='knihy.php'\">Späť</button>";
}
?>
</div>
</div>
</body>
</html>
