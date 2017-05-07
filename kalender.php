<?php
session_start();
?>
<?php
if(isset($_SESSION['username'])){
	echo "you logged in as </br>", $_SESSION['username'];
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
		//checke hvis nuværende month er minimum "previous" eller maks "next"
		//første funktion til "previous" knappen
	function goLastMonth(month, year){
	if(month == 1) {
		//hvis nuværende måned er 1, og der bliver trykket med knappen "prevous" så formindske år 
	--year;
		//og reset måned til 13, så når decrement vil være 12
	month = 13;
	}
		//dernæst minus måned med 1 så det bliver 12
	--month
	//opretter en variabel som indeholder month i string
	var monthstring= ""+month+"";
	//opretter en variabel der gemmer month længden
	var monthlength = monthstring.length;
	//check hvis month længden er 1 eller mindre 
	if(monthlength <=1){
		//hvis sandt indsæt et "0" foran monthstring.
	monthstring = "0" + monthstring;
	}
		//oprette en URL til at sætte month & year så checking af month & year vil sættes til variabler
	document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
	}
		//anden funktion til "next" knappen
	function goNextMonth(month, year){
	if(month == 12) {
		//hvis nuværende måned er 12, og der bliver trykket med knappen "next" så stiger år 
	++year;
		//og reset måned til 0 så når den increment, værdien vil være 1
	month = 0;
	}
		//dernæst plus måned med 1 så det bliver 1
	++month
	var monthstring= ""+month+"";
	var monthlength = monthstring.length;
	if(monthlength <=1){
	monthstring = "0" + monthstring;
	}
	document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
	}
	function myDelete() {
    var txt;
    var r = confirm("Are you sure you want to delete this booking?");
    if (r == true) {
        txt = "The booking hase been deleted";
    } else {
        txt = "";
    }
    document.getElementById("demo").innerHTML = txt;
}
	</script>
		<style>
	.today{
	background-color: #00ff00;
	}
	.event{
	background-color: #FF8080;
	}
	</style>
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
			  <a href="billedeex.html">Billeder</a>
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
					<h2>Book Tid</h2>
					
				</header>
				
				<footer>
					<p class="post-info"> Klik på den ønsket dato og udfyld felterne, dernæst klik på "Add Event". </p>
				</footer>
	
				<content>
					<?php
					//få idags dato og sætte dem til dag, måned og år
					//-check hvis day har en passeret variabel 
					if (isset($_GET['day'])){
						//hvis sandt, få day fra URL
					$day = $_GET['day'];
					} else {
						//ellers, sæt idags dato som day 
					$day = date("j");
					}	
					if(isset($_GET['month'])){
					$month = $_GET['month'];
					} else {
					$month = date("n");
					}
					if(isset($_GET['year'])){
					$year = $_GET['year'];
					}else{
					$year = date("Y");
					}
					//gemme dag, måned og år variabler i timestamp
					$currentTimeStamp = strtotime( "$month-$day-$year");
					//få den pågældende måneds navn
					$monthName = date("F", $currentTimeStamp);
					//få hvor mange dage der er i den pågældende måned.
					$numDays = date("t", $currentTimeStamp);
					// variabel til at tælle celler senere hen
					$counter = 0;
					?>
					<?php
					// hvis add findes oppe i URL, den som ligger i eventform.php så gør følgende:
					if(isset($_GET['add'])){
						//få POST data fra txttitle og txtdetail.
					$title =$_POST['txttitle'];
					$detail =$_POST['txtdetail'];
					//oprette en variabel der indeholder event dagens dato.
					$eventdate = $month."/".$day."/".$year;
					// sql statement insert
					$sqlinsert = "INSERT into eventcalender(username,Title,Detail,eventDate,dateAdded) 
					values ('".$_SESSION['username']."','".$title."','".$detail."','".$eventdate."',now())";
					$resultinginsert = mysqli_query($conn,$sqlinsert);
					if($resultinginsert ){
					echo "Event was successfully Added...";
					}else{
					echo "Event Failed to be Added....";
					}
					}
					?>

					<table border='1'>
					<tr>
					<td><input style='width:50px;' type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"></td>
					<td colspan='5'><?php /*her vises måneds navn og år i kalenderen*/echo $monthName.", ".$year; ?></td>
					<td><input style='width:50px;' type='button' value='>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)"></td>
					</tr>
					<tr>
					<td width='50px'>Søn</td>
					<td width='50px'>Man</td>
					<td width='50px'>Tir</td>
					<td width='50px'>Ons</td>
					<td width='50px'>Tor</td>
					<td width='50px'>Fre</td>
					<td width='50px'>Lør</td>
					</tr>
					<?php
					echo "<tr>";
					//-forloop der looper igennem 1 til antal dage der er i måneden
					for($i = 1; $i < $numDays+1; $i++, $counter++){
					//-lave et timestamp for hver dag i loopen
					//-strtotime = streng, der indeholder en amerikansk engelsk datoformat og vil forsøge at fortolke 
					//dette format til en Unix timestamp
					//-unix: defineret som nummer af sekunder som har forløbet siden 00:00:00 Torsdag, 1 Januar 1970
					$timeStamp = strtotime("$year-$month-$i");
					//-checke hvis det er den første dag i måneden.
					if($i == 1) {
						//-få hvilket dage som er den første dag på måneden.
						$firstDay = date("w", $timeStamp);
						//-lave et loop og lave et blankt celle hvis det ikke er den første dag.
						for($j = 0; $j < $firstDay; $j++, $counter++) {
							//-blankt celle 
							echo "<td>&nbsp;</td>";
						}
					}
					//-check hvis dagen er i den sidste column
					//-hvis det er laver vi en ny række
					if($counter % 7 == 0) {
					echo"</tr><tr>";
					}
					$monthstring = $month;
					//Returns the length of the given string.
					$monthlength = strlen($monthstring);
					// siden det skal være i et loop skal daystring declereres til variabel $i.
					// checker størrelsen af string for både dag og måned før man sætter den i URL,
					//-samt tilføjer et 0 hvis stringen er 1 eller mindre.
					$daystring = $i;
					$daylength = strlen($daystring);
					if($monthlength <= 1){
					$monthstring = "0".$monthstring;
					}
					if($daylength <=1){
					$daystring = "0".$daystring;
					}
					//idags dato.
					$todaysDate = date("m/d/Y");
					//for at highlight den dato der allerede er blevet "added" skal vi have en compare 
					$dateToCompare = $monthstring. '/' . $daystring. '/' . $year;
					echo "<td align='center' ";
					//check hvis todaysDate er det samme som date to compare 
					if ($todaysDate == $dateToCompare){
						//opprettes en klasse ved navn "today". Så den bliver highlight oppe i CSS.
					echo "class ='today'";
					} else{
						//ellers checker den i databasen om dateToCompare findes, 
					$sqlCount = "select * from eventcalender where eventDate='".$dateToCompare."'";
					// her henter vi data fra databasen.
					$noOfEvent = mysqli_num_rows(mysqli_query($conn,$sqlCount));
					// hvis number af events er 1 eller større 
					if($noOfEvent >= 1){
						//opretter vi en klasse ved navn "event". Så den bliver highlight oppe i CSS.
					echo "class='event'";
					}
					}
					// V = true = hvis man trykker på en dato i kalender.
					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
					}
					echo "</tr>";
					?>		
					</table>
					<?php
					//Hvis username ikke er logget ind.
						if(!isset($_SESSION['username'])) {
							echo "Please Login for booking",
							"<br/><a href='login.php'>login</a>"; 
							}else {	
								echo "<hr>";
								echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year.
								"&v=true&f=true'>Add Event</a>";
								$sqlEvent = "select * FROM eventcalender where 
								eventDate='".$month."/".$day."/".$year."'";
								$resultEvents = mysqli_query($conn,$sqlEvent);	
								echo "<hr>";
								if ($events = mysqli_fetch_assoc($resultEvents)){
									if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
									echo "Title: ".$events['Title']."<br>";
									echo "Detail: ".$events['Detail']."<br>";
									echo "Username: ".$events['username']."<br>";
									
									}else {echo "Booked ! choose another date";}
								}else if (isset($_GET['f'])){
									include("eventform.php");
								}
							
								if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
								?>
									<form action="" method="post">
									<input type="submit" name="submit" value="slet booking" />
								<?php
								}if (isset($_POST['submit'])) {
									$sql = "delete FROM eventcalender where eventDate='".$month."/".$day."/".$year."'";
									$resultEvents = mysqli_query($conn,$sql);
										$result=mysqli_query($conn,$sql);
										if ($result)
										{
											echo "Deleted Successfully";
											
										}
										else
										{
											echo "ERROR!";
											// close connection 
											mysqli_close($conn);
										}
								}
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