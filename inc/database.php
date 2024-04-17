<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = 'aanmelden';

$servername = "localhost";
$username = "lucas_koffie";
$password = "4jmNqT5sEkVjTq2yW74s";
$database = 'lucas_koffie';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 
?> 