<?php
// Check if the 'gebruiker' data is set in the POST request
if(isset($_POST['gebruiker'])) {
    // Retrieve the 'gebruiker' data sent from the JavaScript code
    $gebruikerData = $_POST['gebruiker'];

    // If $gebruikerData is a string, it means only one 'gebruiker' value was sent
    if (is_string($gebruikerData)) {
        echo $gebruikerData;
    } 
     else {
        echo "Invalid 'gebruiker' data format.";
    }
} else {
    echo "No 'gebruiker' data received.";
}
