<?php
$email = mysql_escape_string($_GET['email']); 
    $hash = mysql_escape_string($_GET['hash']); 
    echo $email;
    echo $hash;
?>