<?php
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
 <li><a class="active" href="#">Úvod</a></li>
<?php
if(isset($_SESSION["user"])) {

 echo "<div class=\"dropdown\" >";
 echo "<li><a href=\"#\">Knižnica</a></li>";
 echo "<div class=\"dropdown-content\">";
 echo "<a href=\"knihy.php\">Knihy</a>";
 echo "<a href=\"hry.php\">Hry</a>";
 echo "</div>";
 echo "</div>";
}
   ?>
   <li><a href="about.php">O nás</a></li>
<?php
  if(!isset($_SESSION["user"])){
	echo "<li style=\"float:right\"><a href=\"login.php\">Prihlásiť sa</a></li>";
  } else {
	echo "<li style=\"float:right\"><a href=\"logout.php\">Odhlásiť sa</a></l    i>";
	echo "<li style=\"float:right\"><a href=\"profile.php\">Profil</a></li>";
  }
?> 
   </ul>
</nav>

<div class="text-pozd">
<img style="float:right" height=300 src="pics/zbor.jpg" alt="klubovňa">
<h2>Vitaj vo virtuálnej knižnici 40. zboru!</h2>
<p>Na tejto stránke môžete nájsť zoznam knižiek a spoločenských hier, nachádzajúcich sa v jednej z klubovní 40. skautského zboru.</p>
<p>Stránka bola vytvorená aby poskytla prehľad o tom čo sa nachádza v našej kľubovni s možnosťou zapožičania kníh a spoločenských hier. Taktiež by mala slúžiť na to aby sa knižky/spoločenské hry nestrácali a ľudia zodpovedný za knižnicu mali prehľad, kde sa nachádzajú</p>
<p>Po prihlásení ti v menu pribudne možnosť knižnica, v ktroej si vieš pozrieť všetky dostupné knižky a hry, informácie o nich a dokážeš si ich požičiať. Požičané veci potom nájdeš vo svojom profile.</p> 
<h3>Na zobrazenie obsahu stranky je potrebné sa prihlásiť!</h3>
<p>V prípade záujmu o nový účet požiadajte o vytvorenie účtu administratora.</p>

<footer>
  <p><b>autor:</b> Mária Somorovská, <b>kontakt: </b> <a class="email" href="mailto:mariasomorovska@gmail.com">mariasomorovska@gmail.com</a>.
<br>
&copy; <?php echo date("Y");?>
</p>
</footer>

</div>
</div>
</body>
</html>
