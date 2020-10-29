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
	<title>Zoznam Kníh</title>
</head>

<body>
<div class="pozd">
<div class="header">
<h1>Knihy</h1>
</div>

<div class="text-pozd">

<?php
 if(!isset($_SESSION["user"])){
	header("Location: errorpage.php");
  } 

echo "<div class=\"text-pozd\">";

$sql = 'SELECT knihyID, name, author, pouziv
  		FROM knihy
		ORDER BY knihyID  ASC'; // sql dotaz

$sql1 = "SELECT prava FROM users WHERE userID = '$_SESSION[id]'";
$vysl = mysqli_query($sqlcon,$sql1);
$zaz = mysqli_fetch_array($vysl);
$pravo=$zaz['prava'];

$vysledok = mysqli_query($sqlcon,$sql); 

        //echo "<table border='1' style='border-collapse:collapse'>";
		echo "<table class='tabulka'>";
		echo "<tr>";
		echo "<th>ID knihy</th>";
		echo "<th>Kniha</th>";
		echo "<th>Autor</th>";
		echo "</tr>";


		while ($zaznam = mysqli_fetch_assoc($vysledok)) {
			if($zaznam['pouziv'] == 0)
			{
        echo "<tr>";
		echo "<td>$zaznam[knihyID]</td>";
		echo "<td>$zaznam[name]</td>";
		echo "<td>$zaznam[author]</td>";		
		echo "<td><a href='info.php?knihyID=$zaznam[knihyID]'>Informácie</a>";
		if($pravo == 1){
			/*echo "<td><a href='editbook.php?knihyID=$zaznam[knihyID]'>Úprava</a>";*/
			echo "<td><a href='deletebook.php?knihyID=$zaznam[knihyID]'>Vymazať</a>";
		} else {
			echo "<td><a href='borrowbook.php?knihyID=$zaznam[knihyID]'>Požičať</a>";
		}
		echo "</tr>";
			}
			}

        echo "</table>";

?>

<p>
<?php 
		if($pravo == 1){
			echo "<button onclick=\"location.href='addbook.php'\">Pridať knihu</button>";
		}
?>
<button style="float:right" onclick="location.href='kniznica.php'">Späť</button>
</p>
<br>
</div>
</div>
</body>
</html>
