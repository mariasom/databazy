<?php
include ('connect.php');
session_start();
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Northwind PHP,SQL">
	<meta name="keywords" content="HTML,CSS,PHP,SQL">
	<link rel="stylesheet" type="text/css" href="bookstyle1.css">
	<title>Informácie</title>
</head>

<body>
<div class="pozd">
<div class="text-pozd">
<div class="header">
<h1>O hre</h1>
</div>
<?php

 if(!isset($_SESSION["user"])){
	header("Location: errorpage.php");
  }

echo "<div class=\"text-pozd\">";

$sql = "SELECT *
        FROM spol_hry
		WHERE hryID='$_GET[hryID]'"; 
$vysledok = mysqli_query($sqlcon,$sql); 		
$zaznam = mysqli_fetch_assoc($vysledok);		

echo "<h1>$zaznam[nazov]</h1>"; 
echo "<p>Stav hry: $zaznam[stav]</p>";
echo "<b> $zaznam[obsadenost]</b>";
echo '<p style="padding:1em"><img style="float:left;border:20px solid white" width=300 src="data:image/jpeg;base64,'.base64_encode($zaznam['obrazok']).'"/>';
echo "<b>Popis: </b> $zaznam[popis]</p>";
//echo '<img style=float:none src="data:image/jpeg;base64,'.base64_encode($zaznam['obalka']).'"/></p>';

?>

<p style="padding:2em"> <button style="float:right" onclick="location.href='hry.php'">Späť</button></p>

</div>
</div>
</body>

