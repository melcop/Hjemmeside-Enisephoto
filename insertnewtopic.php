<?php 
include("db_const.php");

$cat=$_POST['cat'];

?>

<html>
<body>
<form method="post" name="input" action="insertnewtopic.php">
Nyt Emne: <br>
<input type="text" name="subcategory"><br>
User ID: <br>
<input type="text" name="userid"><br>
<?php
include "db_const.php"; // Database connection 

$result=$conn->query("SELECT cat_id, category FROM category"); 

 echo "<select name='category'>";

    while ($row = mysqli_fetch_array($result)) {
 
                  echo "<option value='" .$row['cat_id'] ."'>" . $row['category']."</option>";
                 
}

 echo "</select>";
 ?>
<button type="submit" name="submit" value="insert" >Send</button>
</form>

<?php
if(isset($_POST['submit'])){

$category=($_POST['category']);
$subcategory=($_POST['subcategory']);
$userid=($_POST['userid']);

$sql = "INSERT INTO  subcategory(cat_id, subcategory,id_user) VALUES ('$category','$subcategory','$userid')";

mysqli_query($conn, $sql); 
}

	$conn -> close();
?>
</body>
</html>