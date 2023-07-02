<?php
// Creating Users Friend List table found in the Friends Database
$conn = mysqli_connect("db", "root", "root", "Friends");
$query = "CREATE TABLE IF NOT EXISTS `{$_SESSION['acc_id']}` (
    `FriendID` varchar(255) COLLATE utf8mb4_general_ci NOT NULL UNIQUE
) ENGINE=InnoDB;";

$result = mysqli_query($conn, $query);

if (!$result) {
    // Query execution failed, handle the error
    echo "Error creating table: " . mysqli_error($conn);
} else {
    // Query executed successfully, no need to fetch the result

    // Perform other operations or queries here
}

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

<?php
// Creating Users Friend story table found in the Users Database
$conn = mysqli_connect("db", "root", "root", "Users");
$query = "CREATE TABLE IF NOT EXISTS `{$_SESSION['acc_id']}-stories` (
    `FriendID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `HasStory` int NOT NULL DEFAULT '0',
    UNIQUE KEY `FriendID` (`FriendID`)
) ENGINE=InnoDB;";

$result = mysqli_query($conn, $query);

if (!$result) {
    // Query execution failed, handle the error
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>