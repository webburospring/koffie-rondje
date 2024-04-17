<?php
require './inc/database.php';
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['naam'])) {
    header('Location: aanmelden.php');
    exit;
} else {
    if (!isset($_SESSION['inserted_into_ingelogdegebruikers'])) {
        // Insert the user into ingelogdegebruikers
        $sql = "INSERT INTO ingelogdegebruikers (gebruikeringelogd) VALUES ('{$_SESSION['naam']}')";
        mysqli_query($conn, $sql);

        // Set a session variable to indicate that the user has been inserted
        $_SESSION['inserted_into_ingelogdegebruikers'] = true;
    }
}

if (isset($_POST['logout'])) {
    $sql_delete = "DELETE FROM ingelogdegebruikers WHERE gebruikeringelogd = '{$_SESSION['naam']}'";
    mysqli_query($conn, $sql_delete); // Assuming $conn is your database connection

    session_destroy();

    header('Location: aanmelden.php');
    exit;
}

if (isset($_POST['reset'])) {
    $sql = "DELETE FROM bestel";
    $sql1 = "DELETE FROM desktopnotificatie";
    $sql2 = "DELETE FROM geselecteerdegebruiker";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        echo "Bestellingen gereset";
        header("Location: bestel.php");
        exit();
    } else {
        echo "Error deleting records: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bestelling.css">
    <title>Bestel</title>
</head>

<body class="m-3 text-light">
    <form action="" method="post">
        <input class="btn btn-primary" type="submit" name="logout" value="Logout">
    </form>
    <?php
    if ($_SESSION['naam'] == 'lucas598') {
        ?><br>
        <form action="./upload/upload.php" method="post">
            <input class="btn btn-primary" type="submit" name="upload" value="Voeg nieuwe foto toe">
        </form>
        <form class=" d-flex mt-4 justify-content-center " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            method="post">
            <input type="submit" class="btn btn-primary" name="reset" value="Reset">
        </form>

        <?php
        echo '<br><div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center bg-light text-dark shadow rounded p-4">Welkom ' . $_SESSION['naam'] . '</h2>
        </div>
        </div><br><br>';
    } else {
        echo '<br><div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center bg-light text-dark shadow rounded p-4">Welkom ' . $_SESSION['naam'] . '</h2>
        </div>
        </div><br><br>';
    }
    ?>
    <p id="timer"></p>
    <h1 class="text-center">Kies een van de onderstaande dranken.</h1>
    <?php
    require './inc/sql.php';
    ?>
    <div id="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <!-- <div id="refreshTable"> -->
                <div class="col-md-2 table1 ">
                    <?php
                    require './inc/tables/table1.php';
                    ?>
                </div>
                <!-- </div> -->
                <div class="col-md-2 table2 ">
                    <?php
                    require './inc/tables/table2.php';
                    ?>
                </div>
                <div class="col-md-2 table3">
                    <table id="tabelGeselecteerd"
                        class=" table table-striped table-dark d-flex mt-4 justify-content-center">
                        <tr>
                            <th class="p-2 rounded border">Geselecteerde gebruiker</th>
                        </tr>
                        <tr>
                            <?php
                            $checkQuery = "SELECT bestelling, gebruiker FROM bestel";
                            $result = mysqli_query($conn, $checkQuery);

                            if (mysqli_num_rows($result) > 2) {
                                ?>
                                <form action="" method="post"></form>
                                <?php
                            }
                            ?>
                            <td id="geselecteerdeGebruikerTr" class="p-2 border geselecteerdeGebruiker">
                            geen gebruiker
                            </td>
                        </tr>



                    </table>
        <!-- HIER STOND DE SCRIPT VOOR HET VERSTUREN VAN EEN RANDOM USER -->
                            

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-4 justify-content-center ">
        <!-- <button class="btn btn-primary" type="submit" onclick="random()">Random</button> -->
        <p id="geselecteerdeGebruiker"></p>
        <p></p>
    </div>
    <div class="container rounded   px-2 pt-4">
        <div class="row d-flex justify-content-center">
            <?php
            $sql = "SELECT naam, fotopath FROM foto";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-2 rounded shadow border mb-3 pt-2 px-4 m-4 bgBlue">
                        <form action="./refresh.php" id="bestelling" method="post">
                            <button onclick="refreshDiv()" id="bestelling1" class="bestelling<?php echo $row['naam']; ?> "
                                type="submit" value="<?php echo $row['naam']; ?>" name="<?php echo $row['naam'] ?>">
                                <img class="img-fluid mt-4  rounded shadow imgGrijs" src="<?php echo $row['fotopath']; ?>"
                                    alt="drinken">
                            </button>
                        </form>
                        <h3 class=" text-light text-center">
                            <?php echo $row["naam"]; ?>
                        </h3>
                    </div>
                    <?php
                }
            }
            ?>
            <?php
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/bestelling.js"></script>
    <script src="./js/geselecteerdeGebruikerAjax.js"></script>
    <script src="./js/notificatie1.js"></script>
    <script src="./js/fetchdata.js"></script>
    <script src="./js/refresh.js"></script>
    <script src="./js/versturenGebruiker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/notificatie1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>