<?php
$env = parse_ini_file('../.env');

$servername = $env['DB_SERVER'] ?? "localhost";
$username = $env['DB_USER'] ?? "lucas_koffie";
$password = $env['DB_PASSWORD'] ?? "4jmNqT5sEkVjTq2yW74s";
$database = $env['DB_DATABASE'] ?? 'lucas_koffie';
echo "<pre>";
var_dump($_ENV, $servername, $username, $password, $database);
echo "</pre>";