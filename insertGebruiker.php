<?php

session_start();
// echo 'insertGebruiker.php';
require './inc/database.php';

if(isset($_POST['insertGebruiker'])) {
    $gebruiker = $_POST['insertGebruiker'];
    // echo 'vanuit php ' .  $gebruiker;
    $currentTime = date(' H:i:s'); 

    // Check if the 'gebruiker' value already exists in the database
    $checkSql = "SELECT COUNT(*) AS count FROM desktopnotificatie WHERE notificatie = '$gebruiker'";
    $checkResult = mysqli_query($conn, $checkSql);
    $checkRow = mysqli_fetch_assoc($checkResult);
    $gebruikerExists = $checkRow['count'] > 0;

    if (!$gebruikerExists) {
        // If the 'gebruiker' doesn't exist, proceed with insertion
        $insertSql = "INSERT INTO desktopnotificatie (notificatie, tijd) VALUES ('$gebruiker', '$currentTime')";
        $insertResult = mysqli_query($conn, $insertSql);
        
        if ($insertResult) {
            // Insertion successful
            echo $gebruiker;
        } else {
            // Error inserting gebruiker
            echo "Error inserting gebruiker: " . mysqli_error($conn);
        }
    } else {
        // 'Gebruiker' already exists
        echo $gebruiker;
    }
}
