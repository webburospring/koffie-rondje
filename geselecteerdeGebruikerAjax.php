<?php
echo "index";
session_start();
error_reporting(E_ALL);
require './inc/database.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sql4 = "SELECT notificatie FROM desktopnotificatie ORDER BY tijd DESC LIMIT 1";
    $result1 = mysqli_query($conn, $sql4);

    if (mysqli_num_rows($result1) > 0) {
        echo 'Je bent  de eerste <br>';
    echo 'werkt';
        
        var_dump($result1);
        $row = mysqli_fetch_assoc($result1);
        echo $_SESSION['naam'];
        if ($row['notificatie'] == $_SESSION['naam']) {
            $sql = "SELECT gebruiker FROM bestel";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo $row['gebruiker'] . "<br>"; 
                }
            }
        } else {
            echo 'Je bent niet de eerste';
            // Do something else if notificatie doesn't match $_SESSION['naam']
        }
    } else {
        echo 'geen resultaten';
    }
}