<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = 'aanmelden';

$env = parse_ini_file('../.env');

$servername = $env['DB_SERVER'] ?? "localhost";
$username = $env['DB_USER'] ?? "lucas_koffie";
$password = $env['DB_PASSWORD'] ?? "4jmNqT5sEkVjTq2yW74s";
$database = $env['DB_DATABASE'] ?? 'lucas_koffie';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 
?> 