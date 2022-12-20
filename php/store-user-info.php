<?php

// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'bumblebees');

// Check for POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extract user info from POST data
  $userName = $_POST['name'];
  $userEmail = $_POST['email'];
  $userID = $_POST['id'];

  // Check if user already exists in database
  $result = $conn->query("SELECT * FROM googleuser WHERE googleMail='$userEmail'");
  if ($result->num_rows > 0) {
    // Update existing user record
    $conn->query("UPDATE googleuser SET googleName ='$userName' WHERE googleMail='$userEmail'");
  } else {
    // Insert new user record
    $conn->query("INSERT INTO googleuser (googleID, googleName, googleMail) VALUES ('$userID', '$userName', '$userEmail')");
  }

  // Close connection
  $conn->close();
}

