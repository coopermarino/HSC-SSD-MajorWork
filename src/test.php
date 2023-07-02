<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "SocialNetwork";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve all data from the accounts table
$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Echo the information
        echo "ID: " . $row["id"] . "<br>";
        echo "Username: " . $row["username"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        // Add more fields as needed
        echo "<br>";
    }
} else {
    echo "No data found in the accounts table.";
}

// Close the connection
$conn->close();
?>
