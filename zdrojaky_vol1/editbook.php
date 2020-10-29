<?php
include ('connect.php');
?>

<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Northwind PHP,SQL">
	<meta name="keywords" content="HTML,CSS,PHP,SQL">
	<link rel="stylesheet" href="bookstyle1.css">
	<title>Editovanie knihy</title>
</head>

<body>
<h1>Editovanie knihy</h1>
<?php

$sql = "SELECT *
		FROM knihy
		WHERE hryID='$_GET[hryID]'"; // sql dotaz
$vysledok = mysqli_query($sqlcon,$sql); 		// vysledok do
tazu
  $zaznam = mysqli_fetch_assoc($vysledok);		// vysledok na
citam do zaznamov po riadkoch

// zobrazim formular
echo ' <form method="post" action="bookupdate.php" >';
// KategoriaMeno
echo "<label>KategoriaMeno:</label>";
echo "<input
		type='text'
		name='KategoriaMeno'
		id='KategoriaMeno'
		value='$zaznam[KategoriaMeno]'
		maxlength='100'
		/>";
echo "<br />";

// Popis
if ($dl_popis = strlen($zaznam['Popis']) > 20) 
	{$dl_popis = strlen($zaznam['Popis']);} 
else $dl_popis=20;

echo "<label>Popis:</label>";
echo "<input
		type='text'
		name='Popis'
		id='meno'
		value='$zaznam[Popis]'
		maxlength='100'
		size='$dl_popis'
		/>";
echo "<br />";
	

// tlacitko
echo '<input name="Submit" type="submit" class="button" value="Odoslať
" />';

// hidden field na KategorieID...
echo "<input
		type='hidden'
		name='KategorieID'
		id='KategorieID'
		value='$zaznam[KategorieID]'
		/>";

echo ' </form>';
?>

</body>

