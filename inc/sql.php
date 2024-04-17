<?php

$sql = "SELECT bestelling, gebruiker FROM bestel";
$sql1 = "SELECT gebruikeringelogd FROM ingelogdegebruikers";
$sql2 = "SELECT bestelling, gebruiker FROM bestel";
$sql3 = "SELECT bestelling, gebruiker FROM bestel";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql1);
$result3 = mysqli_query($conn, $sql2);