<!DOCTYPE html>
<?php
include ("db_const.php");
?>
<html lang="en">
<head>
	<title> Enise Photo Hjemmeside</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta  name="viewport" content="width=device-width, initial-scale=1.8">
    <title>Open Window</title>
	<script>
	
	</script>
</head>
<body class="body">	
	<header class="mainHeader">
		<img src="img/logo.gif">
		
		<nav><ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="forum/entrar.php">Login</a></li>
			<li><a href="billedeex.html">Billeder</a></li>
			<li class="active"><a href="new d.php">Forum</a></li>
			<li><a href="kalender.php">Kalender</a></li>
			
		</ul></nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
				<header>
					<h2>forum</h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Categories </p>
				</footer>
	
				<content>
				<html>
					<body>
				
						<?php
						$sql="SELECT * FROM category";
						$result = mysqli_query($conn,$sql);
						//$row = mysqli_fetch_array($result);
				
						?>
				<table width="300" border="1" cellspacing="1">
				<tr>
				<th>Category</th>
				<tr>
				
				<?php
					while($category=mysqli_fetch_assoc($result)){
						echo "<tr>";
						
						echo "<td>".$category['cate']."</td>";
						
						echo "</tr>";}
				?>

				</table>
					
						
				</body>
				</html>
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