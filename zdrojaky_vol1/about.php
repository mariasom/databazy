<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
   <link rel="stylesheet" type="text/css" href="bookstyle1.css">
   <title>
    O nás
</title>
</head>
 <body>
 <div class="pozd">
 <div class="header">
 <h1>Knižnica</h1> 
</div>
	<nav>
	<ul>
	 <li><a href="kniznica.php">Úvod</a></li>

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

	   <li><a class="active" href="#">O nás</a></li>
	
<?php
	  if(!isset($_SESSION["user"])){
		echo "<li style=\"float:right\"><a href=\"login.php\">Prihlásiť sa</a></li>";
	  } else {
		  echo "<li style=\"float:right\"><a href=\"logout.php\">Odhlásiť sa</a></li>"; 
		  echo "<li style=\"float:right\"><a href=\"profile.php\">Profil</a></li>";
  	  }
?> 
	   </ul>
  </nav>
<div class="text-pozd">
<!--<div class="obr">
<img style="float:right;object-fit:contain" src="pics/klubovna.jpg" alt="klubovňa">
-->
	 <h2>O nás</h2> 
	 <p>Patríme pod 40. skautský zbor Fénix Modra, ktorý pôsobí v Modre už nejakú dobu.</p>
     <p>Klubvňa, v ktorej sa nachádza knižnica s knihami a hrami zaznamenaná na tejto stránke sa nachádza v Modre na Komenského ulici v budove slúžiacej ako kotolňa medzi bytovkami 22 a 26. Vchod do klubovne sa nchádza z vnútornej strany sídliska. </p>

	 <p>Stretávajú sa tam dva dievčenské oddiely a jeden chlapčenský oddiel.</p>

<!--</div>-->
 <footer>
   <p><b>autor:</b> Mária Somorovská, <b>kontakt:</b> <a href="mailto:mariasomorovska@gmail.com">mariasomorovska@gmail.com</a>
<br>
&copy; <?php echo date("Y");?>
</p>
</footer>
</div> 
</div>
 </body>
 </html> 

