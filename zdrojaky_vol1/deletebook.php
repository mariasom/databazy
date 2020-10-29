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
<h1>Vymazanie knihy</h1>
</div>
<div class="login-inside">
<?php
$sql="DELETE FROM knihy WHERE knihyID='$_GET[knihyID]' "; 

$vysledok = mysqli_query($sqlcon,$sql); 

if ($vysledok){
	echo "<h3>Kniha úspešne vymazaná z knižnice.</h3>";
	header("Location: knihy.php");

}
else {
	echo "<h3>Knihy sa nepodarilo vymazať.</h3>";
	echo "<button onclick=\"location.href='knihy.php'\">Späť</button>";
}
?>
</div>
</div>
</body>

