<html>
<body>

<form method="post" name="input" action="insertnewcategory.php">
Ny Kategory: <br>
<input type="text" name="category"><br>

<button type="submit" name="submit" value="insert" >Opret kategory</button>
</form>
						
</body>
</html>

<?php
include("db_const.php");
   
if(isset($_POST['submit'])){

$category=($_POST['category']);


$sql = "INSERT INTO  category(category) VALUES ('$category')";

mysqli_query($conn, $sql);

$conn -> close();
}
?>