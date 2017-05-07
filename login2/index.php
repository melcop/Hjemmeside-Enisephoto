<html>
<head>
<script type="text/javascript">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		</script>	
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login_style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
	</head>
	
	<body>
			<header id="header">
				<ul id="drop-nav">
				  <li><a href="#">Hjem</a></li>
				  <li><a href="#">Billeder</a>
					<ul>
					  <li><a href="#">Bryllup</a></li>
					  <li><a href="#">Henna/Forlovelse</a></li>
					  <li><a href="#">Street</a></li>
					</ul>
				  </li>
				  <li><a href="#login-box" class="login-window">Login / Sign In</a>				  
				  </li>
				  <li><a href="#">Upload Billede</a>
				  </li>
				  <li><a href="#">Book Tid</a>
				  </li>
				  <li><a href="#">Kontakt</a>
				  </li>
				</ul>
			</header>
		<div id="mainwrapper">
		
			<div id="contentwrapper">
				<div id="content">
					<div class="innertube">
						<div class="container">
							<img src="img/messi.jpg" alt="messi" style="width:1000px;height:670px;">
						</div>
					</div>
				</div>
			</div>
			<nav id="rightmenu">
				<div class="innertube">
				</div>
			</nav>
		</div>
			<footer id="footer">
				<div class="innertube">
					<h4><font color="white">Kontakt Info</h4></font>
							<p><font color="white">
							b&aelig;kkelunden 4,2660 Br&oslash;ndby Strand<br> 
							+45 5230 0187<br> 
							mail@ademphotography.dk</p>
				</font></div>
			</footer>
	        <div id="login-box" class="login-popup">
				<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
					Username: <input type="text" name="username" /><br />
					Password: <input type="password" name="password" /><br />
			 
					<input type="submit" name="submit" value="Login" />
				</form>
			</div>
			</body>
			</html>
<?php
if (!isset($_POST['submit'])){

} else {
	include_once("DBConnection.php");
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from user WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<p>Invalid username/password combination</p>";
		header("Location: new.html");
		
	} else {
		echo "<p>Logged in successfully</p>";
		header("Location: new.html");
		
		// do stuffs
	}
}
?>