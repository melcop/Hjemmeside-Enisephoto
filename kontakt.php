<?php
session_start();
?>
<?php
if(isset($_SESSION['username'])){
	echo "Du er logget ind som </br>", $_SESSION['username'];
	echo "<br/><a href='logout.php'>logout</a>";
}else{echo "<br/><a href='login.php'>login</a>";}
?>
<!DOCTYPE html>
<?php
include ("db_const.php");
?>
<html lang="en">
<head>
	<title> Enise Photo Hjemmeside</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/ss.css">
	<link rel="stylesheet" type="text/css" href="css/dropd.css">
	<meta  name="viewport" content="width=device-width, initial-scale=1.8">
    <title>Open Window</title>
	<script>
	
	</script>
</head>
<body class="body">

	<header class="mainHeader">
		<img src="img/logo.gif">
		
		<nav>
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
					<h2>Kontaktform</h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Udflyld venligst felterne </p>
				</footer>
	
				<content>
					<?php 
					if(isset($_SESSION['username'])) {
						$action=$_REQUEST['action']; 
						if ($action=="")    /* display the contact form */ 
							{	 
							?> 
							<form  action="" method="POST" enctype="multipart/form-data"> 
							<input type="hidden" name="action" value="submit"> 
							Fulde Navn:<br> 
							<input name="name" type="text" required value="" size="30"/><br> 
							Din email:<br> 
							<input name="email" type="email" required value="" size="30"/><br> 
							Besked / spørgsmål:<br> 
							<textarea name="message" required rows="7" cols="30"></textarea><br> 
							<input type="submit" value="Send email"/> 
							</form> 
							<?php 
							}  
						else                /* send the submitted data */ 
							{ 
								$name=$_REQUEST['name']; 
								$email=$_REQUEST['email']; 
								$message=$_REQUEST['message']; 
								if (($name=="")||($email=="")||($message=="")) 
									{ 
									echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
									} 
								else{         
									$from="From: $name<$email>\r\nReturn-path: $email"; 
									$subject="Message sent using your contact form"; 
									mail("mail@AdemPhotography.dk ", $subject, $message, $from); 
									echo "Email sent!"; 
									} 
							}
					} else {
						echo "Venligst login for at sende en besked.";
						}							
						?> 
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