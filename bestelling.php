<?php
require './inc/database.php';
session_start();
// echo 'Welkom ' . $_SESSION['naam'];

// Iterate through the $_POST array to access each input field

// Retrieve and iterate over the $_POST array
foreach ($_POST as $bestelling => $value) {
    if (isset($_POST[$bestelling])) {
        if (strlen($bestelling) > 1) {
            $sql = "INSERT INTO bestel (bestelling, gebruiker) VALUES ('$bestelling', '{$_SESSION['naam']}')";
            if (mysqli_query($conn, $sql)) {
                echo "<p class='alert alert-success'>U heeft het volgende besteld: " . $bestelling . "</p>";
                                                                                                
                header("Location: index.php");
        } else {
            header('Location: bestel.php');
            exit();
        }
                                                                                    
        } else {
            echo "<p class='alert alert-danger'>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        header("Location: bestel.php");
        exit();
    }
}

