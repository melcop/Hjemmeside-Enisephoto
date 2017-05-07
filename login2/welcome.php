<?php
session_start();
?>
<?php
if(isset($_SESSION['CurrentUser'])){
echo "Welcome ".$_SESSION['CurrentUser'];
}
?>
<html>
<body>
<a href="http://www.photobyenise.dk/login2/login.php">logout</a>
</body>
</html>