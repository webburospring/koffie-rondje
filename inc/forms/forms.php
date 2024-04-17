<form action="" method="post">
        <input class="btn btn-primary" type="submit" name="logout" value="Logout">
    </form>

    <h1 class="text-center">Kies een van de onderstaande dranken.</h1>
    <div class="d-flex d-flex mt-4 justify-content-center">
        <?php
        if ($_SESSION['naam'] == 'lucas598') {
            ?>
            <br><form action="./upload/upload.php" method="post">
            <input class="btn btn-primary" type="submit" name="upload" value="Voeg nieuwe foto toe">
            </form>
            <br>
        <?php
        echo '<br>&nbsp;<p> Welkom ' . $_SESSION['naam'] . '</p><br>'; 
        } else {
            echo '<br>&nbsp;<p> Welkom ' . $_SESSION['naam'] . '</p><br>';
            echo '<br>&nbsp;<p>  geen admin' . '</p><br>';
        }
        ?>
    </div>