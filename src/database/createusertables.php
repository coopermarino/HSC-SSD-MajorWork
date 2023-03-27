<?php
// Creating Users Friend List table found in the Friends Database
    $conn = mysqli_connect("db", "root", "root", "Friends");
    $query = "CREATE TABLE IF NOT EXISTS `{$_SESSION['acc_id']}` (
        `FriendID` varchar(255) COLLATE utf8mb4_general_ci NOT NULL UNIQUE
    ) ENGINE=InnoDB;";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
?>


<?php
// // Creating Users Friend List table found in the Friends Database
//     $conn = mysqli_connect("db", "root", "root", "SocialNetwork");
//     $query = "";
// 
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result);
//     mysqli_close($conn);
// ?>