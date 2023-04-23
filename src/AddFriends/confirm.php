<?php
include('../checksession/security.php');
// Check if the confirm parameter is set
if (isset($_GET['confirm'])) {
  $uid = $_GET['confirm'];

  // Connect to the database
  $host = "db";
  $username = "root";
  $password = "root";
  $dbname = "SocialNetwork";
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Search for the pending request with the given UID
  $query = "SELECT * FROM pendingRequests WHERE buttonUID='$uid'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Error searching for pending request: " . mysqli_error($conn));
  }

  // Extract the userSent and userReceive values from the result
  $row = mysqli_fetch_assoc($result);
  $userSent = $row['userSent'];
  $userRecieve = $row['userRecieve'];

  // Delete the pending request from the pendingRequests table
  $deleteQuery = "DELETE FROM pendingRequests WHERE buttonUID='$uid'";
  $deleteResult = mysqli_query($conn, $deleteQuery);
  if (!$deleteResult) {
    die("Error deleting pending request: " . mysqli_error($conn));
  }


  mysqli_close($conn);

  // Send a confirmation response with the userSent and userReceive values
  echo "Confirmed friend with UID: $uid";

  
  
  // Add User SQL

  $host = "db";
  $username = "root";
  $password = "root";
  $dbname = "Friends";
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


  $insertQuerySent = "INSERT INTO `$userSent` (FriendID) VALUES ('$userRecieve')";
  $insertQueryRecieve = "INSERT INTO `$userRecieve` (FriendID) VALUES ('$userSent')";
  $insertResult = mysqli_query($conn, $insertQuerySent);
  $insertResult = mysqli_query($conn, $insertQueryRecieve);
  if (!$insertResult) {
    die("Error inserting friend into Friends table: " . mysqli_error($conn));
  }
  // Close the database connection
  mysqli_close($conn);



  // ADDS Friend to user stories

  $host = "db";
  $username = "root";
  $password = "root";
  $dbname = "Users";

  // Create database connection
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Sanitize user input
  $friendId = mysqli_real_escape_string($conn, $friendId);
  $story = mysqli_real_escape_string($conn, $story);
  // Insert story into appropriate tables
  $insertQuerySentStory = "INSERT INTO `{$_SESSION['acc_id']}-stories` (FriendID) VALUES ('$userSent')";
  $insertQueryRecieveStory = "INSERT INTO `{$userSent}-stories` (FriendID) VALUES ('{$_SESSION['acc_id']}')";

  $insertResultSent = mysqli_query($conn, $insertQuerySentStory);
  $insertResultRecieve = mysqli_query($conn, $insertQueryRecieveStory);
  if (!$insertResultSent || !$insertResultRecieve) {
      die("Error inserting story into {$_SESSION['acc_id']}-stories table: " . mysqli_error($conn));
  }

  // Close the database connection
  mysqli_close($conn);


}
if (isset($_GET['deny'])) {
    $uid = $_GET['deny'];
  
    // Connect to the database
    $host = "db";
    $username = "root";
    $password = "root";
    $dbname = "SocialNetwork";
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  

  
    // Delete the pending request from the pendingRequests table
    $deleteQuery = "DELETE FROM pendingRequests WHERE buttonUID='$uid'";
    $deleteResult = mysqli_query($conn, $deleteQuery);
    if (!$deleteResult) {
      die("Error deleting pending request: " . mysqli_error($conn));
    }
  
  
    mysqli_close($conn);
  }
  else {
    // Send an error response if the confirm parameter is missing
    header("HTTP/1.0 400 Bad Request");
    echo "Error: a correct parameter is missing.";
  }

?>
