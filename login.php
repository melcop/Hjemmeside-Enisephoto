<?php
session_start();
?>
<?php
	if(isset($_SESSION['username'])){
		echo "You are already logged in as",$_SESSION['username'];
	}else
	{
		if(isset($_POST['bttLogin'])){
		require 'db_const.php';
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,sha1($_POST['password']));
		$result = mysqli_query($conn,'select * from user where username="'.$username.'" and password="'.$password.'"');
		if(mysqli_num_rows($result)==1){
			$_SESSION['username'] = $username;
			header('Location: index.php');
		}	
		else
			echo 'Account invalid';
		}
		if(isset($_GET['logout'])){
			session_unregister('username');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Enise Photo Hjemmeside</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/ss.css">
	<link rel="stylesheet" type="text/css" href="css/dropd.css">
	<meta  name="viewport" content="width=device-width, initial-scale=1.8">
    <title>Open Window</title>
</head>
<body class="body">

	<header class="mainHeader">
		<img src="img/logo.gif">
		
		<nav>
		  <div id="logo">Photo By Enise</div>
		  <label for="drop" class="toggle">Menu</label>
		  <input type="checkbox" id="drop" />
		  <ul class="menu">
			<li><a href="index.php">Home</a></li>
			<li> 
			  <!-- First Tier Drop Down -->
			  <label for="drop-1" class="toggle">Billeder</label>
			  <a href="billedeex.php">Billeder</a>
			  <input type="checkbox" id="drop-1"/>
			  <ul>
				<li><a href="bryllupper.php">Bryllupper</a></li>
				<li><a href="forlovelse.php">Henna + Forlovelse</a></li>
				<li><a href="street.php">Street</a></li>
			  </ul>
			</li>
			<li><a href="forum/index.php">Forum</a></li>
			<li><a href="kalender.php">Kalender</a></li>
			<li><a href="kontakt.php">Kontakt</a></li>
		  </ul>
		</nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2>Login</h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Udfyld venligst felterne for at logge ind. </p>
				</footer>
	
				<content>	
						<!-- The HTML login form -->
							<form method="post">
								Username: <input type="text" name="username" /><br />
								Password: <input type="password" name="password" /><br />
									
								<input type="submit" name="bttLogin" value="Login" />
							</form>
							<form action="registrere.php" method="post">
								<input type="submit" name="Submit" value="Registrere" />
								
							</form>							
				</content>
			</article>
		</div>
	</div>
	
	<footer class="mainFooter">
		<h4><font color="white">Kontakt Info</h4></font>
							<p><font color="white"></font>
							b&aelig;kkelunden 4,2660 Br&oslash;ndby Strand<br> 
							+45 5230 0187<br> 
							mail@ademphotography.dk</p>
	</footer>
</body>

</html>  