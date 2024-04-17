<?php
require './inc/database.php';
session_start();



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['reset'])) {
        $sql = "DELETE FROM bestel";
        if (mysqli_query($conn, $sql)) {
            echo "Bestellingen gereset";
        } else {
            echo "Error deleting records: " . mysqli_error($conn);
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Drinken bestellen</h1>
    <form class="text-center" action="aanmelden.php" method="post">
        <input type="submit" class="btn btn-primary p-4" required name="aanmelden" value="Aanmelden">
        <input type="submit" class="btn btn-primary p-4" required name="login" value="Login">
    </form>
    
    <?php
    $sql = "SELECT bestelling, gebruiker FROM bestel";
    $result = mysqli_query($conn, $sql);
    ?>


    
    <div class="d-flex mt-4 justify-content-center ">
    <!-- <button class="btn btn-primary" type="submit" onclick="random()">Random</button> -->
    <p id="geselecteerdeGebruiker"></p>
    <p></p> 
    </div>

    <?php
    mysqli_free_result($result);
    ?>
    <script src="./js/index.js"></script>
    <script>
        // Function to refresh the table every second

        let table = document.getElementById('tabel');
        let rows = table.rows.length;
        let geenBestellingenElement = document.getElementById('geenBestellingen');
        let cells = table.querySelectorAll('.gebruiker'); 



        // Set interval to reload the table content every 1 second (for example)
        setInterval(cells, 1000); 

        if (geenBestellingenElement) {
            let geenBestellingen = geenBestellingenElement.innerHTML;
            
        } else {
                if (rows == 2) {
                    if (Notification.permission === 'granted') {
                        // If the browser supports notifications and permission is granted
                        showNotification();
                    } else if (Notification.permission !== 'denied') {
                        // If the browser supports notifications but permission is not yet granted
                        Notification.requestPermission().then(function(permission) {
                            if (permission === 'granted') {
                                showNotification();
                            }
                        });
                    }
                    
                    function showNotification() {
                        const notification = new Notification('Desktop Notification', {
                            body: "Er heeft iemand drinken besteld.",
                            title: "test",
                            icon: '../melding/icon.png' // You can provide an icon URL here
                        });
                    
                        // Optional: handle notification click event
                        notification.onclick = function(event) {
                            // Handle notification click behavior here
                            console.log('Notification clicked');
                        };
                    }
                }
            // console.log("Element with ID 'geenBestellingen' not found");
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>