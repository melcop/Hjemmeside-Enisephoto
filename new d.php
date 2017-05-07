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
					<p class="post-info"> Forum </p>
				</footer>
	
				<content>
				<html>
				<body>
				        <h2> Kategorier <h2>
						<?php
							include "db_const.php"; // Database connection 

							$result = $conn->query("SELECT * FROM category");

							echo "<select name='cate'>";

							while ($row = mysqli_fetch_array($result)) {
 
							echo "<option value='" .$row['cate'] ."'>" . $row['cate']."</option>";
                 
							}

							echo "</select>"; 
							 ?>
							<br> <h2> Emner <h2>
						<?php
						    @$id_category=$_GET['id_category'];
							
							$result2 = $conn->query("SELECT * FROM topic where id_category='$id_category'");

							echo "<select name='topic'>";

							while ($row2 = mysqli_fetch_array($result2)) {
 
							echo "<option value='" .$row2['titel'] ."'>" . $row2['titel']."</option>";
                 
							}

							echo "</select>";

							?>
						
						<?php
						$sql="SELECT * FROM comment";
						$result3 = mysqli_query($conn,$sql);
						//$row = mysqli_fetch_array($result);
				
						?>
						<br>
						<table width="200" border="1" cellspacing="1">
						<tr>
						<!--<th>ID</th> -->
						<th>Comments</th>
						<tr>
						<br>
						<?php
						while($topic=mysqli_fetch_assoc($result3)){
							echo "<tr>";
						
							echo "<td>".$topic['comment']."</td>";
						
							echo "</tr>";}
						?>
						</table><br>

						
						<form>
						<input type="text" name="comment"><br>
						<button type="button">Send</button>
						</form>
						
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