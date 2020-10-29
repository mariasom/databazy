<?php
include ('connect.php');
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
<h1>Vymazanie hry</h1>
</div>
<div class="login-inside">
<?php
$sql="DELETE FROM spol_hry WHERE hryID='$_GET[hryID]' "; 

$vysledok = mysqli_query($sqlcon,$sql); // vysledok dotazu

if ($vysledok){
	echo "<h3>Hra úspešne vymazaná z knižnice.</h3>";
	header("Location: hry.php");
}
else {
	echo "<h3>Hru sa nepodarilo vymazať.</h3>";
	echo "<button onclick=\"location.href='hry.php'\">Späť</button>";
}
?>
</div>
</div>
</body>
</html>
