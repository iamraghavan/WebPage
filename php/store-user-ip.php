<?php

// Connect to MySQL database
// require_once './config.php';
$conn = new mysqli('localhost', 'root', '', 'bumblebees');

// Check for POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extract user info from POST data
  $userIP = $_POST['ip'];
  
  // Check if user already exists in database
  $result = $conn->query("SELECT * FROM userip WHERE ip_address='$userIP'");
  if ($result->num_rows > 0) {
    // Update existing user record
    $conn->query("UPDATE userip SET ip_address='$userIP' WHERE ip_address='$userIP'");
  } else {
    // Insert new user record
    $conn->query("INSERT INTO userip (ip_address) VALUES ('$userIP')");
  }

  // Close connection
  $conn->close();
}

