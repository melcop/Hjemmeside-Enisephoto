<!DOCTYPE html>
<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<?php
//Include las clases
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/usuarios.php';


?>
<html lang="en">
<head>
	<title> Enise Photo Hjemmeside</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta  name="viewport" content="width=device-width, initial-scale=1.8">
	<link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
	
</head>
<body class="body">

	<header class="mainHeader">
		<img src="../img/logo.gif">
		
		<nav><ul>
			<li><a href="../index.php">Home</a></li>
			<li class="active"><a href="entrar.php">Login</a></li>
			<li><a href="../billedeex.php">Billeder</a></li>
			<li><a href="index.php">Forum</a></li>
			<li><a href="#">Contact</a></li>
		</ul></nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2><a href="#" title="first post">Login</a></h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Indtast Brugernavn og Adgangskode </p>
				</footer>
				
				<content>
					<div class="caja">
						
						
						<?php
						if (isset($_GET["m"])) {
							switch ($_GET["m"]) {
								case 1:
									echo "<div class='error'>Brugernavn eller Adgangskode er forkert</div>";
									break;
							}
						}
						?>
						<head>
							<link rel="stylesheet" type="text/css" href="css/style.css">
						</head>

						<div class="foro">
							<form method="post" action="login.php">
							<h2>Login</h2>
							<label>Brugernavn:</label>
							<input type="text" name="usuario"  placeholder="Brugernavn" required autofocus>
							<label>Adgangskode:</label>
							<input type="password" name="password"  placeholder="Adgangskode" required>
							<br>
							<button class="btn" type="submit">Login</button>

						  </form>
                          <form method="post" action="registrere.html">
                          <button class="btn" type="submit">Registrer</button>


						</div>
					</div>
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