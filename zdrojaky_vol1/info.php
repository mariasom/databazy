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
<div class="header">
<h1>O knihe</h1>
</div>
<?php
 if(!isset($_SESSION["user"])){
	header("Location: errorpage.php");
  }

echo "<div class=\"text-pozd\">";

$sql = "SELECT knihyID, name, author, stav, obsadenost, rok, strany, info, obalka
		FROM knihy
		WHERE knihyID='$_GET[knihyID]'"; // sql dotaz
$vysledok = mysqli_query($sqlcon,$sql); 		// vysledok dotazu
  $zaznam = mysqli_fetch_assoc($vysledok);		// vysledok nacitam do zaznamov po riadkoch

echo "<h1>$zaznam[name]</h1>"; 
echo "<h2>$zaznam[author]</h2>";
echo "<p>Rok vydania: $zaznam[rok]</p>";
echo "<p>Počet strán: $zaznam[strany]</p>";
echo "<p>Stav knihy: $zaznam[stav]</p>";
echo "<b> $zaznam[obsadenost]</b>";
echo '<p style="padding:1em"><img style="float:left;border:20px solid white" width=300 src="data:image/jpeg;base64,'.base64_encode($zaznam['obalka']).'"/>';
echo "<b>Popis: </b> $zaznam[info]</p>";
//echo '<img style=float:none src="data:image/jpeg;base64,'.base64_encode($zaznam['obalka']).'"/></p>';

?>

<p style="padding:2em"> <button style="float:right" onclick="location.href='knihy.php'">Späť</button></p>


</div>
</div>
</body>

