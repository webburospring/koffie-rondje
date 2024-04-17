<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = 'aanmelden';

$servername = $_ENV['DB_SERVER'] ?? "localhost";
$username = $_ENV['DB_USER'] ?? "lucas_koffie";
$password = $_ENV['DB_PASSWORD'] ?? "4jmNqT5sEkVjTq2yW74s";
$database = $_ENV['DB_DATABASE'] ?? 'lucas_koffie';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 
?> 