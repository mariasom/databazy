<?php
include('connect.php');
session_start();
?>
<!doctype html>
<html>
<head>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	<title>Virtuálna knižnica</title>
	<link rel="stylesheet" type="text/css" href="bookstyle1.css">
</head>
<body>
<div class="pozd">
<div class="header">
<h1>Knižnica</h1>
</div>

<nav>
<ul>
 <li><a href="kniznica.php">Úvod</a></li>

<div class="dropdown" >
	  <li><a href="#">Knižnica</a></li>
	   <div class="dropdown-content">
  <a href="knihy.php">Knihy</a>
  <a href="hry.php">Hry</a>
   </div>
   </div>
   <li><a href="about.php">O nás</a></li>
<?php
  if(!isset($_SESSION["user"])){
	echo "<li style=\"float:right\"><a href=\"login.php\">Prihlásiť sa</a></li>";
  } else {
	echo "<li style=\"float:right\"><a href=\"logout.php\">Odhlásiť sa</a></l    i>";
	echo "<li style=\"float:right\"><a class=\"active\" href=\"profile.php\">Profil</a></li>";
  }
?> 
   </ul>
</nav>

<?php 
	 if(!isset($_SESSION["user"])){
	header("Location: errorpage.php");
  } 

    echo "<div class=\"text-pozd\">";


	$sql = "SELECT * FROM users
		WHERE userID='$_SESSION[id]'"; 
	$vysledok = mysqli_query($sqlcon,$sql); 	
  	$zaznam = mysqli_fetch_assoc($vysledok);	
	
	echo "<h2>Profil: $_SESSION[user] </h3>";
	if($zaznam['prava'] == 1 )
	{
		echo "<p>Práva: administrátor </p> <br>";
		echo "<table style=padding:30px";
		echo "<tr>";
		echo "<button onclick=\"location.href='addbook.php'\">Pridať knihu</button>";
		echo "<button onclick=\"location.href='addgame.php'\">Pridať hru</button> ";
		echo "<button onclick=\"location.href='adduser.php'\">Pridať užívateľa</button>";
		echo "</tr>";
		echo "</table>";
		echo "<br>";
			
	} else { 
		echo "<p><b>Práva:</b> užívateľ </p>";
		echo "<p><b>Oddiel:</b> $zaznam[oddiel]</p> <br>";
/*echo '<p><img style=float:left src="data:image/jpeg;base64,'.base64_encode($zaznam['foto']).'"/>';
		echo "<b> O mne: $zaznam[about]</p>";*/
		
		$sql1="SELECT * FROM knihy WHERE pouziv='$_SESSION[id]'";
		$vysl = mysqli_query($sqlcon,$sql1);

		if($vysl){
			echo "<h3>Požičané knihy</h3> <br>";
			echo "<table class='tabulka'>";
			while ($zaznam1 = mysqli_fetch_assoc($vysl)) {
				        echo "<tr>";
							echo "<td>$zaznam1[knihyID]</td>";
							echo "<td>$zaznam1[name]</td>";
							echo "<td>$zaznam1[datum]</td>";		
							echo "<td><a href='returnbook.php?knihyID=$zaznam1[knihyID]'>Vrátiť knihu</a>";
							echo "</tr>";
			}
			echo "</table>";
		}

	$sql2="SELECT * FROM spol_hry WHERE pouziv='$_SESSION[id]'";
    $vysl2 = mysqli_query($sqlcon,$sql2);

	if($vysl2){
      echo "<h3>Požičané hry</h3> <br>";
      echo "<table class='tabulka'>";
      while ($zaznam2 = mysqli_fetch_assoc($vysl2)) {
                   echo "<tr>";
                   echo "<td>$zaznam2[hryID]</td>";
                   echo "<td>$zaznam2[nazov]</td>";
                   echo "<td>$zaznam2[datum]</td>";
                   echo "<td><a href='returngame.php?hryID=$zaznam2[hryID]'>Vrátiť hru</a>";
                   echo "</tr>";
           }
       echo "</table>";
 
    }
	}
?>

<footer>
  <p>autor: Mária Somorovská, kontakt: <a href="mailto:mariasomorovska@gmail.com">
  mariasomorovska@gmail.com</a>.
<br>
&copy; <?php echo date("Y");?>

</p>

</footer>

</div>
</div>
</body>
</html>
