<?php
$mysql_server="localhost";
$mysql_user="kniznica";
$mysql_pass="dzumelec";
$mysql_dbs="kniznica";

$sqlcon = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_dbs);

$result = mysqli_set_charset($sqlcon,"utf8");

if (!$result)	die ('Nastala chyba pri pripojeni.' . mysqli_error());
?>

