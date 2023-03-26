<?php

    include('../checksession/security.php');

    // Get the user ID from the session
    $userID = $_SESSION['acc_id'];
    // Get the new code from the POST request
    $addCode = $_POST['addCode'];
    
    
    $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
    $query = 'SELECT * FROM codes WHERE code = "'.$addCode.'"';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    $assoCode = $row['id'];

    // Find Username of the id found from the associoated code above

    $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
    $query = 'SELECT * FROM accounts WHERE id = "'.$assoCode.'"';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    $added = $row['username'];
    $addedid = $row['id'];

    if(strcasecmp($added, $_SESSION['username']) == 0){
        echo "Self_Add_Error";
        die;
    }else{
        //echo $added;
    }

    // Now get the profile pic of the user
    $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
    $query = "SELECT profilePic FROM ProfilePics WHERE id = '$addedid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    //echo $row['profilePic'];

    
    //Returns the results as JSON
    echo '{
            "added" : "'.$added.'",
            "profilePic": "'.$row['profilePic'].'"
          }';
    $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
    $uid = bin2hex(random_bytes(18));
    $query = "INSERT INTO `pendingRequests` (`userSent`, `userRecieve`, `buttonUID`) VALUES ($userID, $assoCode, '$uid') ON DUPLICATE KEY UPDATE `userSent` = `userSent`";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
?>
