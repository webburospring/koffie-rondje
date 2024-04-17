<?php
require './inc/database.php';
session_start();

if (!isset($_SESSION['naam'])) {
    header('Location: aanmelden.php');
    exit; 
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: aanmelden.php');
    exit;
}

// echo 'Welkom ' . $_SESSION['naam'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>File Upload</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form  action="upload_handler.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control w-25" name="naam" id=""><br>
        <input type="file"  class="btn btn-primary" name="file" accept="image/*">
        
        <input type="submit" value="Upload" name="submit">
    </form>
    <h2>Verwijder</h2>
    <?php
    $sql = "SELECT naam, fotopath FROM foto";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-2 rounded shadow border mb-3 pt-2 px-4 m-4 bgBlue">
                <form action="" id="bestelling" method="post">
                    <button  id="bestelling1" class="bestelling<?php echo $row['naam']; ?> "
                        type="submit" value="<?php echo $row['naam']; ?>" name="<?php echo $row['naam'] ?>">
                        <img class="foto<?php echo $row['fotopath'] ?>" height="300" width="300" src="<?php echo $row['fotopath']; ?>"
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

    <a href="../bestel.php">Bestel pagina</a>
    <script src="./js/verwijderRecord.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
