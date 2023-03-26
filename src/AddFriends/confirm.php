<?php

// Check if the confirm parameter is set
if (isset($_GET['confirm'])) {
  $uid = $_GET['confirm'];

  // TODO: Perform whatever actions are necessary to confirm the friend
  // with the given UID. For example, you might update a database record
  // or send a notification to the user who made the friend request.

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

  // Send a confirmation response with the userSent and userReceive values
  echo "Confirmed friend with UID: $uid";
  echo "User sent: $userSent";
  echo "User receive: $userRecieve";

  // Add User SQL


  // Close the database connection
  mysqli_close($conn);
} else {
  // Send an error response if the confirm parameter is missing
  header("HTTP/1.0 400 Bad Request");
  echo "Error: confirm parameter is missing.";
}

?>
