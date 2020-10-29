<?php
include ('connect.php');

if(isset($_POST['submit'])) {

	if($sqlcon === false) {
		die("ERROR.". $mysqli_connect_error());
	}
 
$sql1 = "INSERT INTO users (nickname, password, oddiel)
	VALUES('$_POST[nickname]', '$_POST[password]', '$_POST[oddiel]')";

$vysledok = mysqli_query($sqlcon,$sql1); 

header("Location: profile.php");
}
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="bookstyle1.css">
	<title>Pridanie užívateľa</title>
</head>

<body>
<div class="login">
<div class="header">
<h1>Pridanie užívateľa</h1>
</div>
<div class="login-inside">
<?php
echo ' <form enctype="multipart/form-data" method="post" action="" >';

echo "<b>Prezývka: </b>";
echo "<input type='text' name='nickname' value=''/><br>";
echo "<br>";

echo "<b>Heslo: </b>";
echo "<input type='password' name='password' value=''/><br>";
echo "<br>";

echo "<b>Oddiel: </b>";
echo "<input type='text' name='oddiel' value=''/><br>";
echo "<br >";
echo "<br>";

echo '<button name="submit" type="submit">Vytvoriť</button>';

// hidden field na idknihy a dostupnost...
echo "<input type='hidden' name='prava' value='0'/>";
echo "<input type='hidden' name='userID' id='userID' value=''>";
echo ' </form>';

?>
<p style="padding:1em"> <button style="float:right" onclick="location.href='hry.php'">Späť</button></p>
</div>
</div>
</body>
</html>

