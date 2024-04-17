<?php
$servername = $_ENV['DB_SERVER'] ?? "localhost";
$username = $_ENV['DB_USER'] ?? "lucas_koffie";
$password = $_ENV['DB_PASSWORD'] ?? "4jmNqT5sEkVjTq2yW74s";
$database = $_ENV['DB_DATABASE'] ?? 'lucas_koffie';

var_dump($servername, $username, $password, $database);