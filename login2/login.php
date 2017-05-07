<?php
session_start();
  
?>
<?php
include_once("db_const.php");

//Tjekker hvis brugeren allerede er logget på.
if(!isset($_SESSION['id'] ))
{
 $message = 'User is already logged in';
}


if (!isset($_POST['submit'])){
?>

<?php
} else {
	include_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = trim($username);
	$password = trim($password);
	
 
	$sql = "SELECT * from user WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<p>Invalid username/password combination</p>";
	} else {
		$_SESSION['CurrentUser'] = $username;
		echo "<p>Logged in successfully</p>";

	}
}
?>	
<html>
<body>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
 
		<input type="submit" name="submit" value="Login" />
	</form>

</body>
</html>