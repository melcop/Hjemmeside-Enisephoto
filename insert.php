<html>
<body>

<form method="post" name="input" action="insert.php">
ID Comment: <br>
<input type="text" name="idcomment"><br>
ID Topic: <br>
<input type="text" name="idtopic"><br>
Id User: <br>
<input type="text" name="iduser"><br>
Kommentar: <br>
<input type="text" name="comment"><br>
<button type="submit" name="submit" value="insert" >Send</button>
</form>
						
</body>
</html>

<?php
include("db_const.php");
   
if(isset($_POST['submit'])){

$idcomment=($_POST['idcomment']);

$idtopic=($_POST['idtopic']);

$iduser=($_POST['iduser']);

$comment = $_POST['comment'];

$sql = "INSERT INTO  comment(id_comment, id_topic, id_user,comment) VALUES ('$idcomment', '$idtopic', '$iduser','$comment')";

mysqli_query($conn, $sql);

$conn -> close();
}
?>
