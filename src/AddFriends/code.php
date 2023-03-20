<?php
include('../checksession/security.php');

// Get the user ID from the session
$userID = $_SESSION['acc_id'];
// Get the new code from the POST request
$newCode = $_POST['newcode'];

$db_server = "db";
$db_username= "root";
$db_password = "root";
$db_name = "SocialNetwork";

$connect = mysqli_connect($db_server,$db_username,$db_password);
$db_config = mysqli_select_db($connect,$db_name);

if($db_config){
    // $_SESSION['status'] = "Database Connected";
}
else{
    $_SESSION['status'] = "Fatal error: Database not connected";
}

$query = 'INSERT INTO codes (id, code) VALUES ("'.$userID.'", "'.$newCode.'") ON DUPLICATE KEY UPDATE code="'.$newCode.'"';
$result = mysqli_query($connect, $query);
print($query);
print($result);
?>
