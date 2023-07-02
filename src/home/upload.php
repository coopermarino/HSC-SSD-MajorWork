<?php
session_start();
include "../checksession/security.php";
require "../database/dbconfig.php";
require "../database/createusertables.php";
require "../badges/badges.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve uploaded images
  if (isset($_FILES["photo"])) {
    $imageCount = count($_FILES["photo"]["name"]);
    $uploadedImages = array();
    for ($i = 0; $i < $imageCount; $i++) {
      $tempFile = $_FILES["photo"]["tmp_name"][$i];
      $fileName = $_FILES["photo"]["name"][$i];
      $destinationDirectory = "../uploads/" . $_SESSION['acc_id'] . '/';
      if (!is_dir($destinationDirectory)) {
        mkdir($destinationDirectory, 0777, true);
      }
      $destination = $destinationDirectory . $fileName;
      move_uploaded_file($tempFile, $destination);
      $uploadedImages[] = $destination;
    }
  }

  // Retrieve title and description
  $title = $_POST["title"];
  $description = $_POST["description"];

  // Echo the uploaded images, title, and description
  echo "<h2>Uploaded Images:</h2>";
  foreach ($uploadedImages as $image) {
    echo "<img src='$image' alt='Uploaded Image' width='200'><br>";
  }
  echo "<h2>Title:</h2>";
  echo "<p>$title</p>";
  echo "<h2>Description:</h2>";
  echo "<p>$description</p>";
}
?>
