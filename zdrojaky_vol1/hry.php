<?php
include ('connect.php');
session_start();
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="bookstyle1.css">
	<title>Zoznam Hier</title>
</head>

<body>
<div class="pozd">
<div class="header">
<h1>Hry</h1>
</div>

<?php
 if(!isset($_SESSION["user"])){
	header("Location: errorpage.php");
  } 

echo "<div class=\"text-pozd\">";

$sql = 'SELECT * FROM spol_hry ORDER BY hryID ASC';

$sql1 = "SELECT prava FROM users WHERE userID = '$_SESSION[id]'";
$vysl = mysqli_query($sqlcon,$sql1);
$zaz = mysqli_fetch_array($vysl);
$pravo=$zaz['prava'];

$vysledok = mysqli_query($sqlcon,$sql); 

        //echo "<table border='1' style='border-collapse:collapse'>";
		echo "<table>";
		echo "<tr>";
		echo "<th>ID hry</th>";
		echo "<th>Hra</th>";
		echo "</tr>";


		while ($zaznam = mysqli_fetch_assoc($vysledok)) {
			if($zaznam['pouziv'] == 0) {
        echo "<tr>";
		echo "<td>$zaznam[hryID]</td>";
		echo "<td>$zaznam[nazov]</td>";
		echo "<td><a href='infogame.php?hryID=$zaznam[hryID]'>Informácie</a>";
		if($pravo == 1){
			/*echo "<td><a href='editgame.php?hryID=$zaznam[hryID]'>Úprava</a>";*/
			echo "<td><a href='deletegame.php?hryID=$zaznam[hryID]'>Vymazať</a>";
		} else {
			echo "<td><a href='borrowgame.php?hryID=$zaznam[hryID]'>Požičať</a>";
		}
		echo "</tr>";
			}
		}
        echo "</table>";

?>

<p>

<?php
if($pravo == 1){
echo "<button onclick=\"location.href='addgame.php'\">Pridať hru</button>";
}
?>

<button style="float:right" onclick="location.href='kniznica.php'">Späť</button>
<br>
</p>
</div>
</div>
</body>
</html>
