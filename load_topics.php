<?php
    include "db_const.php"; 
    ini_set('display_errors', 1);
    
    if(isset($_GET['cate']))
    {   
        $c = $_GET['cate'];
        $topics = '';
        
        $r = mysql_query("SELECT id_topic, titel FROM topic WHERE id_topic='$c'");
        
        while($row = mysql_fetch_assoc($r))
        {
            $topics .= '<option value="'.$row['id_topic'].'">'.$row['titel'].'</option>';
        }
        
        if($topics == '')
            echo '';
        else 
            echo '<select name="topic"><option disabled>Select topic</option>'.$topics.'</select>';
    }

?>