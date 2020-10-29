<?php
   include("connect.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
     $myusername = mysqli_real_escape_string($sqlcon,$_POST['username']);
     $mypassword = mysqli_real_escape_string($sqlcon,$_POST['password']); 
	  
     $sql = "SELECT userID FROM users WHERE nickname = '$myusername' and password = '$mypassword'";
	 $results = mysqli_query($sqlcon, $sql);
	 $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
     $id = $row['userID'];  
     $count = mysqli_num_rows($results);
  
	 if($count == 1) {
         $_SESSION['user'] = $myusername;
		 $_SESSION['id'] = $id;
  		 
		 header("Location: kniznica.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!doctype html>
<html>
	<head>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<title>Virtuálna knižnica</title>
		<link rel="stylesheet" type="text/css" href="bookstyle1.css">
	</head>
<body>
<div class="login">
<div class="header">
<h2>Prihlásenie</h2>
</div>
<div class="login-inside">

<p><form action="" method="post">
<b>Prezývka:</b> <input type="text" name="username"><br>
<br>
<b>Heslo:</b> <input type="password" name="password"><br>
<br>
<input style="float:center" type="submit" value = "Prihlásiť sa">
</form></p>
<!--<button onclick="location.href='kniznica.php'">Späť</button> 

<footer>
  <p>autor: Mária Somorovská, kontakt: <a href="mailto:mariasomorovska@gmail.com">
  mariasomorovska@gmail.com</a>.</p>
</footer>-->

</div>
</div>
</body>
</html>

