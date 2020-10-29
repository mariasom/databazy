<?php
include ('connect.php');

if(isset($_POST['submit'])) {

	if($sqlcon === false) {
		die("ERROR.". $mysqli_connect_error());
	}
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

$tmpName = $_FILES['image']['tmp_name'];

// Read the file
$fp = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));
$data = addslashes($data);
fclose($fp);
};
 
$sql1 = "INSERT INTO spol_hry (nazov, stav, obsadenost, popis, obrazok)
	VALUES('$_POST[nazov]', '$_POST[stav]', '$_POST[obsadenost]', '$_POST[popis]' ,'$data')";

$vysledok = mysqli_query($sqlcon,$sql1); 

header("Location: hry.php");
}
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="bookstyle1.css">
	<title>Pridanie hry</title>
</head>

<body>
<div class="login">
<div class="header">
<h1>Pridanie hry</h1>
</div>
<div class="login-inside">
<?php
echo ' <form enctype="multipart/form-data" method="post" action="" >';

echo "<b>Názov hry: </b>";
echo "<input type='text' name='nazov' value=''/><br>";
echo "<br>";

echo "<b>Stav: </b>";
echo "<input type='text' name='stav' value=''/><br>";
echo "<br>";

 /*echo "<b>Obsadenosť: </b>";
 echo "<input type='text' name='obsadenost' value=''/>";
 echo "<br>";*/

echo "<b>Popis: </b>";
echo "<textarea style=\"float:right;resize:none;padding-bottom:2em\" name='popis' rows='10' cols='45'> Sem vložte popis. </textarea><br>";
echo "<br >";

echo "<b>Obálka hry: </b>";
echo '<input name="MAX_FILE_SIZE" value="102400" type="hidden">';
echo '<input name="image" accept="image/jpeg" type="file">';
echo "<br>";
echo "<br>";

echo '<button name="submit" type="submit">Odoslať</button>';

// hidden field na idknihy a dostupnost...
echo "<input type='hidden' name='obsadenost' value='voľná'/>";
echo "<input type='hidden' name='knihyID' id='knihyID' value=''>";
echo ' </form>';

?>
<p style="padding:1em"> <button style="float:right" onclick="location.href='hry.php'">Späť</button></p>
</div>
</div>
</body>
</html>

