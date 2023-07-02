<?php

$db_server = "db";
$db_username= "root";
$db_password = "root";
$db_name = "SocialNetwork";

$connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);
if($db_config){
    // $_SESSION['status'] = "Database Connected";
}
else{
    $_SESSION['status'] = "Fatal error: Database not connected";
}

?>