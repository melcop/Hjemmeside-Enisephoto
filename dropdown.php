<?php
include "db_const.php"; // Database connection 

$result = $conn->query("SELECT * FROM category");

    echo "<select name='cate'>";

    while ($row = mysqli_fetch_array($result)) {
 
                  echo "<option value='" .$row['cate'] ."'>" . $row['cate']."</option>";
                 
}

    echo "</select>";
	
	$result2 = $conn->query("SELECT * FROM topic");

    echo "<select name='topic'>";

    while ($row2 = mysqli_fetch_array($result2)) {
 
                  echo "<option value='" .$row2['titel'] ."'>" . $row2['titel']."</option>";
                 
}

    echo "</select>";

 ?>
 
 