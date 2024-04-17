<?php
session_start();
require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValue = $_POST["buttonValue"]; 
    $naam = $_SESSION['naam'];

    $checkQuery = "SELECT * FROM bestel WHERE gebruiker = '$naam'";
    $result = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($result) > 0) {
        echo "Value already exists in the database.";
    } else {
        $sql = "INSERT INTO bestel (bestelling, gebruiker) VALUES ('$inputValue', '$naam')";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error inserting into the database: " . mysqli_error($conn);
        }
    }
} else {
    $naam = $_SESSION['naam'];
    $checkQuery = "SELECT bestelling, gebruiker FROM bestel";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $data = array(); 
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                "bestelling" => $row["bestelling"],
                "gebruiker" => $row["gebruiker"]
            );
        }
        echo json_encode($data);
    } else {
        echo "No records found in the database.";
    }
}

mysqli_close($conn);
