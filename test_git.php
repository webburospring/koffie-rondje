<?php
$servername = $_ENV['DB_SERVER'] ?? "localhost";
$username = $_ENV['DB_USER'] ?? "lucas_koffie";
$password = $_ENV['DB_PASSWORD'] ?? "4jmNqT5sEkVjTq2yW74s";
$database = $_ENV['DB_DATABASE'] ?? 'lucas_koffie';
$getenvVars = [getenv("DB_SERVER"), getenv("DB_USER"), getenv("DB_PASSWORD"), getenv("DB_DATABASE")];
echo "<pre>";
var_dump($_ENV, $servername, $username, $password, $database);
var_dump($getenvVars);
echo "</pre>";