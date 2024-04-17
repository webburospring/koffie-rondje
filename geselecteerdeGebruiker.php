<?php

require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the value of 'persoonDieGaatHalen'
    $gebruiker = $_POST['persoonDieGaatHalen'];

    // Split the string into an array using the comma as the delimiter
    $gebruikerArray = explode(',', $gebruiker);

    // Pick a random value from the array
    $randomIndex = array_rand($gebruikerArray);
    $randomValue = $gebruikerArray[$randomIndex];

    // Check if a record already exists in the 'geselecteerdegebruiker' table
    $checkSql = "SELECT COUNT(*) AS count FROM geselecteerdegebruiker";
    $checkResult = mysqli_query($conn, $checkSql);
    $checkRow = mysqli_fetch_assoc($checkResult);
    $recordExists = $checkRow['count'] > 0;

    if (!$recordExists) {
        // If no record exists, insert the new record
        $insertSql = "INSERT INTO geselecteerdegebruiker (geselecteerdegebruiker) VALUES ('$randomValue')";
        if (mysqli_query($conn, $insertSql)) {
            // echo "New record inserted with value: " . $randomValue;
        } else {
            // echo "Error inserting new record: " . mysqli_error($conn);
        }
    }
    // Execute the SELECT query
    $sql = "SELECT geselecteerdegebruiker FROM geselecteerdegebruiker";
    $result = mysqli_query($conn, $sql);
    
    // Check if there are any records returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Print out each record
            echo $row['geselecteerdegebruiker'];
        }
    } else {
        echo "No records found.";
    }
    

}
?>
<?PHP

// // echo 'Welkom ' . $_SESSION['naam'];
// $gebruiker = $_POST["geselecteerdeGebruiker"]; 
//     echo 'de gebruiker ';

// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $currentTime = date(' H:i:s'); 

//     // echo 'de gebruiker de geinsert moet worden' .$gebruiker;
//     // Check if the user already exists in the database
//     $checkSql = "SELECT COUNT(*) AS count FROM desktopnotificatie WHERE notificatie = '$gebruiker'";
//     $checkResult = mysqli_query($conn, $checkSql);
//     $checkRow = mysqli_fetch_assoc($checkResult);
//     $userExists = $checkRow['count'] > 0;

//     if (!$userExists) {
//         // If the user doesn't exist, perform the insertion
//         $sql = "INSERT INTO desktopnotificatie (notificatie, tijd) VALUES ('$gebruiker', '$currentTime')";
//         if (mysqli_query($conn, $sql)) {
//             // echo "<div class='sessieNaam'>" . $_SESSION['naam'] . "</div>";
//             // echo "<div class='inputValue'>" . $inputValue . "</div>";
//             header("Refresh: 0; URL=bestel.php");
//         }
//     } else {
//         // If the user already exists, you may want to handle it accordingly
//         echo "User already exists.";
//     }
// }

?>
