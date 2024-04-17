<?php
require './inc/database.php';
error_reporting(E_ALL);
session_start();

if (isset($_POST['aanmelden'])) {
    $naam = htmlspecialchars($_POST['naam']);
    $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
    $herhaalwachtwoord = htmlspecialchars($_POST['herhaalwachtwoord']);

    if ($wachtwoord !== $herhaalwachtwoord) {
        echo "<p class='alert alert-danger'>Passwords do not match.</p>";
        exit;
    }

    if (strlen($wachtwoord) < 8 || strlen($wachtwoord) > 255 || strlen($naam) < 2 || strlen($naam) > 40) {
        echo "<p class='alert alert-danger'>Ongeldige naam of wachtwoord.</p>";
        ?>
        <a class='btn btn-primary' href="aanmelden.php">Terug naar aanmelden</a>
        <?php
        exit;
    }

    if (strlen($naam) < 3 || strlen($naam) > 50) {
        echo "<p class='alert alert-danger'>Ongeldige naam of wachtwoord.</p>";
        ?>
        <a class='btn btn-primary' href="aanmelden.php">Terug naar aanmelden</a>
        <?php
        exit;
    }


    //check of gebruiker al gebestaat
    $check_sql = "SELECT * FROM aanmelden WHERE naam = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $naam);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<p class='alert alert-danger'>Naam al in gebruik.</p>";
        ?>
        <a class='btn btn-primary' href="aanmelden.php">Terug naar aanmelden</a>
        <?php
        exit;
    }

    $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO aanmelden (naam, wachtwoord) VALUES (?, ?)";
    $insert_stmt = mysqli_prepare($conn, $insert_sql);
    mysqli_stmt_bind_param($insert_stmt, "ss", $naam, $hashed_password);

    if (mysqli_stmt_execute($insert_stmt)) {
        echo "<p class='alert alert-success'>Registratie susccesvol. U kunt inloggen</p>";
        ?>
        <form action="aanmelden.php">
            <input class='btn btn-primary' type="submit" name="login" class="btn btn-primary" value="Log in">
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Error: " . mysqli_error($conn) . "</p>";
    }
}

if (isset($_POST['login'])) {
    $naam = $_POST['naam'];
    $wachtwoord = $_POST['wachtwoord'];

    $select_sql = "SELECT * FROM aanmelden WHERE naam = ?";
    $select_stmt = mysqli_prepare($conn, $select_sql);
    mysqli_stmt_bind_param($select_stmt, "s", $naam);
    mysqli_stmt_execute($select_stmt);
    $result = mysqli_stmt_get_result($select_stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['wachtwoord'];

        if (password_verify($wachtwoord, $hashed_password)) {
            $_SESSION['naam'] = $naam;
            header('Location: bestel.php');
            exit;
        } else {
            echo "<p class='alert alert-danger'>Ongeldige gebruikersnaam of wachtwoord.</p>";
            ?>
            <form action="aanmelden.php">
                <input class='btn btn-primary' type="submit" name="login" class="btn btn-primary" value="Log in">
            </form>
            <?php
        }
    } else {
        echo "<p class='alert alert-danger'>Ongeldige gebruikersnaam of wachtwoord</p>";
        ?>
        <form action="aanmelden.php">
            <input class='btn btn-primary' type="submit" name="login" class="btn btn-primary" value="Log in">
        </form>
        <?php
    }
}

mysqli_close($conn);
?>
