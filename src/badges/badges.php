<?php
    $db_server = "db";
    $db_username= "root";
    $db_password = "root";
    $db_name = "SocialNetwork";

    $connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    // Construct the query using the session variable and escape it using mysqli_real_escape_string
    $user_id = mysqli_real_escape_string($connect, $_SESSION['acc_id']);
    $query = "SELECT `userRecieve` FROM `pendingRequests` WHERE `userRecieve` = '$user_id'";
    // Execute the query and check if there's an error
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die('Error: ' . mysqli_error($connect));
    }

    // Loop through the results and print them
    $row = mysqli_fetch_assoc($result);
    if($row > 0){
        $pendingRequest = 1;
    }
?>