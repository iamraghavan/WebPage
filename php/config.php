<?php

// Define database parameters
$db_host = 'localhost';
$db_name = 'bumblebees';
$db_user = 'root';
$db_pass = '';

// Connect to the MySQL database using PDO
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

?>
