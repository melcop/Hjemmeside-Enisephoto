<?php
session_start();
?>
<?php
if(isset($_SESSION['username'])){
	echo "Du er logget ind som </br>", $_SESSION['username'];
	echo "<br/><a href='logout.php'>logout</a>";
}else{echo "<br/><a href='login.php'>login</a>";}
?>
<!doctype html>
<html lang="en">
<head>
	<title> Enise Photo Hjemmeside</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/ss.css">
	<link rel="stylesheet" type="text/css" href="css/dropd.css">
	<link rel="stylesheet" type="text/css" href="css/billede.css">
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/lb.css">
	<meta  name="viewport" content="width=device-width, initial-scale=1.8">
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
		<script>
		jQuery(document).ready(function($) {
			
			$('.lightbox_trigger').click(function(e) {
				
				//prevent default action (hyperlink)
				e.preventDefault();
				
				//Get clicked link href
				var image_href = $(this).attr("href");
				
				/* 	
				If the lightbox window HTML already exists in document, 
				change the img src to to match the href of whatever link was clicked
				
				If the lightbox window HTML doesn't exists, create it and insert it.
				(This will only happen the first time around)
				*/
				
				if ($('#lightbox').length > 0) { // #lightbox exists
					
					//place href as img src value
					$('#content').html('<img src="' + image_href + '" />');
					
					//show lightbox window - you could use .show('fast') for a transition
					$('#lightbox').show();
				}
				
				else { //#lightbox does not exist - create and insert (runs 1st time only)
					
					//create HTML markup for lightbox window
					var lightbox = 
					'<div id="lightbox">' +
						'<p>Click to close</p>' +
						'<div id="content">' + //insert clicked link's href into img src
							'<img src="' + image_href +'" />' +
						'</div>' +	
					'</div>';
						
					//insert lightbox HTML into page
					$('body').append(lightbox);
				}
				
			});
			
			//Click anywhere on the page to get rid of lightbox window
			$('#lightbox').live('click', function() { //must use live, as the lightbox element is inserted into the DOM
				$('#lightbox').hide();
			});

		});
		</script>
    <title>Open Window</title>
</head>
<body class="body">

		<header class="mainHeader">
		<img src="img/logo.gif">
		<nav>
		<label for="drop" class="toggle">Menu</label>
		  <input type="checkbox" id="drop" />
		  <ul class="menu">
			<li class="active"><a href="index.php">Home</a></li>
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
					<h2>Billeder</h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Klik for at forstørre billedet </p>
				</footer>
	
				<content>
					<ul class="rig columns-4">
							
							<?php
							
								//Billederne bliver lagt ind i en array($files)
								$files = glob("images/*.*");

								for ($i=1; $i<count($files); $i++) {
									$image = $files[$i];
									
							?>
									<li><a href= "<?php echo $image ?>"class="lightbox_trigger"><?php
									echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";}
							?>
									</li>														
							
					</ul>
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
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.grid-nav li a').on('click', function(event){
			event.preventDefault();
			$('.grid-container').fadeOut(500, function(){
				$('#' + gridID).fadeIn(500);
			});
			var gridID = $(this).attr("data-id");
			
			$('.grid-nav li a').removeClass("active");
			$(this).addClass("active");
		});
	});
	</script>
</body>

</html>  