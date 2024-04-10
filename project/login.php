<?php

// Database connection credentials (replace with your actual values)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Now you can proceed with your SQL queries using the $conn object

// Example query:
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Process the results
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"] . ", Username: " . $row["username"] . "<br>";
  }
} else {
  echo "No results found";
}

// Close connection (optional, PHP usually closes it automatically)
$conn->close();

?>
